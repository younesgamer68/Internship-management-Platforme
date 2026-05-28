<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CareerFieldController extends Controller
{
    /**
     * @return array<int, string>
     */
    private function fields(): array
    {
        return [
            'Business',
            'Computer Science & IT',
            'Creative, Design & Fashion',
            'Engineering',
            'Entrepreneurship & Startups',
            'Finance',
            'Green Tech & Sustainability',
            'Health, Wellness & Sports Management',
            'Healthcare & Pharmaceutical',
            'Hospitality, Tourism & Events',
            'International Dev, NGOs & Charity',
            'Legal',
            'Logistics & Supply Chain',
            'Marketing',
            'Media, Communications & Publishing',
            'Real Estate',
            'Recruitment & HR',
            'Urban Planning & Architecture',
            'UI/UX Design',
            'Product Management',
            'Data Analytics',
            'Full Stack Development',
        ];
    }

    public function index()
    {
        return view('signe-up.career-field.career-field', [
            'careerFields' => $this->fields(),
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'career_field' => ['required', 'string', Rule::in($this->fields())],
        ]);

        $request->user()->forceFill([
            'career_field' => $validated['career_field'],
        ])->save();

        return redirect()->route('intern.opportunities')
            ->with('success', 'Your career field has been saved.');
    }
}