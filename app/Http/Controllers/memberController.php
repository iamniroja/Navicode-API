<?php                                                                        

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;
use Illuminate\Support\Facades\Storage;


class memberController extends Controller
{
    protected $member;
        //initialize member model
       public function __construct(){
           $this->member = new Member();
       }
    public function index()
    {  
           return $this->member->all();
       
        }
       
        
    

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'role' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'Status' => 'required|string|max:15'
            
        ]);
        //store the image if provider
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
            $validated['image'] = $imagePath;
        // Create and save new member
        $member = Member::create($validated);
   
        // Return the newly created member data
        return response()->json([
            'message' => 'Details added successfully',
            'member_id' => $member->id
        ], 200);
    }
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
       $member = $this->member->find($id);

       if (!$member) {
           return response()->json(['message' => 'Member not found'], 404);
       }

       return response()->json($member, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $member = $this->member->find($id);

        if (!$member) {
            return response()->json(['message' => 'Member not found'], 404);
        }

        // Validate incoming data
        $validated = $request->validate([
            'name' => 'sometimes|string|max:255',
            'role' => 'sometimes|string|max:255',
            'images' => 'sometimes|image|mimes:jpeg,png,jpg,gif|max:2048',
            'Status' => 'sometimes|string|max:15'
        ]);

        // Update member data
        $member->update($validated);
        
        
        return response()->json([
            'message' => 'Member updated successfully',
            'member' => $member
        ], 200);

    }
    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $member = $this->member->find($id);


        
        if ($member->image) {
            Storage::disk('public')->delete($member->image);
        }


        if (!$member) {
            return response()->json(['message' => 'Member not found'], 404);
        }

        $member->delete();

        return response()->json([
            'message' => 'Member deleted successfully'
        ], 200);
    }
}
