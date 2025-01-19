<?php

namespace App\Http\Controllers\admin\program;

use App\Http\Controllers\Controller;
use App\Models\Program;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Faq;
class ProgramController extends Controller
{
    public function index()
    {
        $programs = Program::with('faqs')->get(); // Eager load FAQs
        return view('admin.programs.index', compact('programs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.programs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'faqs.*.question' => 'nullable|string|max:255',
            'faqs.*.answer' => 'nullable|string',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string',
            'hederscript' => 'nullable|string',
        ]);

        // Save program
        $programData = $request->only(['title', 'description','meta_title','meta_description','hederscript']);
        if ($request->hasFile('image')) {
            $programData['image'] = $request->file('image')->store('programs', 'public');
        }

        $program = Program::create($programData);

        // Save FAQs
        if ($request->filled('faqs')) {
            foreach ($request->faqs as $faq) {
                if (!empty($faq['question']) && !empty($faq['answer'])) {
                    $program->faqs()->create($faq);
                }
            }
        }

        return redirect()->route('programs.index')->with('msg', 'Program created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Program $program)
    {
        return view('admin.programs.show', compact('program'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Program $program)
    {
        return view('admin.programs.edit', compact('program'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Program $program)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'faqs.*.question' => 'nullable|string|max:255',
            'faqs.*.answer' => 'nullable|string',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string',
            'hederscript' => 'nullable|string',
        ]);

      

        // Update program
        $programData = $request->only(['title', 'description','meta_title','meta_description','hederscript']);
        if ($request->hasFile('image')) {
            // Delete the old image if it exists
            if ($program->image) {
                Storage::disk('public')->delete($program->image);
            }
            $programData['image'] = $request->file('image')->store('programs', 'public');
        }
        $program->update($programData);

        // Update FAQs
        $program->faqs()->delete(); // Remove old FAQs
        if ($request->filled('faqs')) {
            foreach ($request->faqs as $faq) {
                if (!empty($faq['question']) && !empty($faq['answer'])) {
                    $program->faqs()->create($faq);
                }
            }
        }

        return redirect()->route('programs.index')->with('msg', 'Program updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Program $program)
    {
        // Delete associated FAQs
        $program->faqs()->delete();

        // Delete the image if it exists
        if ($program->image) {
            Storage::disk('public')->delete($program->image);
        }

        // Delete the program
        $program->delete();

        return redirect()->route('programs.index')->with('msg', 'Program deleted successfully!');
    }
}
