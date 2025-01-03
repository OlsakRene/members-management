<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMemberRequest;
use App\Http\Requests\UpdateMemberRequest;
use App\Http\Resources\MemberResource;
use App\Models\Member;
use App\Models\MemberTag;
use App\Repositories\MemberRepository;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    protected $memberRepository;

    /**
     * Constructor
     *
     * @param MemberRepository $memberRepository
     */
    public function __construct(MemberRepository $memberRepository)
    {
        $this->memberRepository = $memberRepository;
    }

    /**
     * Display a listing of the members.
     *
     * @param Request $request
     */
    public function index(Request $request)
    {
        $members = $this->memberRepository->getAllMembers();

        return $request->wantsJson()
            ? MemberResource::collection($members)
            : view('members.index', compact('members'));
    }

    /**
     * Show the form for creating a new member.
     *
     * @param Request $request
     */
    public function create(Request $request)
    {
        $tags = MemberTag::all();

        return $request->wantsJson()
            ? response()->json(['message' => 'Use POST /members to create a member'])
            : view('members.create', compact('tags'));
    }

    /**
     * Show the form for editing the specified member.
     *
     * @param Request $request
     * @param int $id
     */
    public function edit(Request $request, int $id)
    {
        $member = Member::find($id);

        if (!$member) {
            return $this->notFoundResponse($request, "No member found with ID $id");
        }

        $tags = MemberTag::all();

        return $request->wantsJson()
            ? response()->json(['member' => new MemberResource($member), 'tags' => $tags])
            : view('members.edit', compact('member', 'tags'));
    }

    /**
     * Store a newly created member in storage.
     *
     * @param StoreMemberRequest $request
     */
    public function store(StoreMemberRequest $request)
    {
        $validated = $request->validated();

        $member = $this->memberRepository->createMember($validated);

        if ($request->has('tags')) {
            $member->tags()->sync($request->input('tags'));
        }

        $member->load('tags');

        return $request->wantsJson()
            ? new MemberResource($member)
            : redirect()->route('members.index');
    }

    /**
     * Update the specified member in storage.
     *
     * @param UpdateMemberRequest $request
     * 
     * @param int $id
     */
    public function update(UpdateMemberRequest $request, int $id)
    {
        $member = Member::findOrFail($id);

        $member->update($request->validated());

        if ($request->isJson()) {
            if ($request->has('tags')) {
                $member->tags()->sync($request->input('tags', []));
            }
        } else {
            $tags = $request->input('tags', []);
            $member->tags()->sync($tags);
        }

        $member->load('tags');

        return $request->wantsJson()
            ? response()->json($member)
            : redirect()->route('members.index');
    }

    /**
     * Display the specified member.
     *
     * @param Request $request
     * @param int $id
     */
    public function show(Request $request, int $id)
    {
        $member = Member::with('tags')->find($id);

        if (!$member) {
            return $this->notFoundResponse($request, "No member found with ID $id");
        }

        return $request->wantsJson()
            ? new MemberResource($member)
            : view('members.show', compact('member'));
    }

    /**
     * Remove the specified member from storage.
     *
     * @param Request $request
     * @param int $id
     */
    public function destroy(Request $request, $id)
    {
        $member = Member::find($id);

        if (!$member) {
            return $this->notFoundResponse($request, "No member found with ID $id");
        }

        $this->memberRepository->deleteMember($member);

        return $request->wantsJson() 
            ? response()->json(['message' => 'Member deleted successfully.'])
            : redirect()->route('members.index');
    }

    /**
     * Handle not found resource response.
     *
     * @param Request $request
     * @param string $message
     */
    private function notFoundResponse(Request $request, $message = 'Resource not found')
    {
        return $request->wantsJson()
            ? response()->json(['message' => $message], 404)
            : view('errors.notfound', ['message' => $message]);
    }
}
