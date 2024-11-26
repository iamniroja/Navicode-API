<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use App\Http\Controllers\Controller;

class clientController extends Controller
{  
     protected $client;
      //initialize client model
     public function __construct(){
         $this->client = new Client();

     }

     //Diplay list of clients
    public function index()
    { return $this->client->all();
       // return Client::all();
    }


      //create new client record
    public function store(Request $request)
    {  //validate incomming request data
   
      $validated = $request->validate([
         'name' => 'required|string|max:255',
       'phonenumber' => 'required|string',
         'date' => 'required|date',
         
         
          'status' => 'sometimes|string'
     ]);

     // Create and save new client
     $client = Client::create($validated);

     // Return the newly created client data
     return response()->json([
         'message' => 'Details added successfully',
         'client_id' => $client->id
     ], 200);

     
}

    
    
       // Find and show a client record by ID
    public function show(string $id)
    {       // Find client by ID 
     
       $client = $this->client->find($id);

       if (!$client) {
           return response()->json(['message' => 'Client not found'], 404);
       }

       return response()->json($client, 200);
   
    
    }
   
      // Update a specific client record by ID
    public function update(Request $request, string $id)
    {
       
        $client = $this->client->find($id);

        if (!$client) {
            return response()->json(['message' => 'Client not found'], 404);
        }

        // Validate incoming data
        $validated = $request->validate([
            'name' => 'sometimes|string|max:255',
          
            'date' => 'sometimes|date',
            'phonenumber' => 'sometimes|string',
          
             'status' => 'sometimes|string'
        ]);

        // Update client data
        $client->update($validated);

        return response()->json([
            'message' => 'Client updated successfully',
            'client' => $client
        ], 200);

      



    

    /**
     * Remove the specified resource from storage.
    */}
    public function destroy(string $id)
    {
        
    }
}