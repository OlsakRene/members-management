<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTagRequest;
use App\Http\Requests\UpdateTagRequest;
use App\Http\Resources\TagResource;
use App\Models\MemberTag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    /**
     * Display a listing of the tags.
     * 
     * @param Request $request
     */
    public function index(Request $request)
    {
        $tags = MemberTag::all();

        return $request->wantsJson()
            ? TagResource::collection($tags)
            : view('tags.index', compact('tags'));
    }

    /**
     * Show the form for creating a new tag.
     * 
     * @param Request $request
     */
    public function create(Request $request)
    {
        return $request->wantsJson()
            ? response()->json(['message' => 'Use POST /tags to create a tag'])
            : view('tags.create');
    }

    /**
     * Store a newly created tag in storage.
     * 
     * @param StoreTagRequest $request
     */
    public function store(StoreTagRequest $request)
    {
        $validated = $request->validated();

        $tag = MemberTag::create($validated);

        return $request->wantsJson()
            ? new TagResource($tag, 201)
            : redirect()->route('tags.index');
    }

    /**
     * Display the specified tag.
     * 
     * @param Request $request
     * @param int $id
     */
    public function show(Request $request, int $id)
    {
        $tag = MemberTag::with('members')->find($id);

        if (!$tag) {
            return $this->notFoundResponse($request, "No tag found with ID $id");
        }

        return $request->wantsJson()
            ? new TagResource($tag)
            : view('tags.show', compact('tag'));
    }

    /**
     * Show the form for editing the specified tag.
     * 
     * @param Request $request
     * @param int $id
     */
    public function edit(Request $request, int $id)
    {
        $tag = MemberTag::find($id);

        if (!$tag) {
            return $this->notFoundResponse($request, "No tag found with ID $id");
        }

        return $request->wantsJson()
            ? new TagResource($tag)
            : view('tags.edit', compact('tag'));
    }

    /**
     * Update the specified tag in storage.
     * 
     * @param UpdateTagRequest $request
     * @param int $id
     */
    public function update(UpdateTagRequest $request, int $id)
    {
        $tag = MemberTag::findOrFail($id);

        if (!$tag) {
            return $this->notFoundResponse($request, "No tag found with ID $id");
        }

        $validated = $request->validated();

        $tag->update($validated);

        return $request->wantsJson()
            ? new TagResource($tag)
            : redirect()->route('tags.index');
    }

    /**
     * Remove the specified tag from storage.
     * 
     * @param Request $request
     * @param int $id
     */
    public function destroy(Request $request, int $id)
    {
        $tag = MemberTag::find($id);

        if (!$tag) {
            return $this->notFoundResponse($request, "No tag found with ID $id");
        }

        if ($tag->members->count() > 0) {
            return $this->unprocessableEntityResponse(
                $request,
                'Tag cannot be deleted as it is associated with members'
            );
        }

        $tag->delete();

        return $request->wantsJson()
            ? response()->json(['message' => 'Tag deleted successfully'])
            : redirect()->route('tags.index');
    }

    /**
     * Handle not found response.
     * 
     * @param Request $request
     * @param string $message
     */
    private function notFoundResponse(Request $request, string $message)
    {
        return $request->wantsJson()
            ? response()->json(['message' => $message], 404)
            : abort(404, $message);
    }

    /**
     * Handle unprocessable entity response.
     * 
     * @param Request $request
     * @param string $message
     */
    private function unprocessableEntityResponse(Request $request, string $message)
    {
        return $request->wantsJson()
            ? response()->json(['message' => $message], 422)
            : back()->with('error', $message);
    }
}