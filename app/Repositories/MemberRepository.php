<?php

namespace App\Repositories;

use App\Models\Member;

class MemberRepository
{
    /**
     * Gets all members with tags.
     */
    public function getAllMembers()
    {
        return Member::with('tags')->get();
    }

    /**
     * Creates a member.
     *
     * @param array $data
     */
    public function createMember(array $data)
    {
        $member = Member::create($data);
        return $member;
    }

    /**
     * Deletes a member.
     *
     * @param Member $member
     */
    public function deleteMember(Member $member)
    {
        return $member->delete();
    }
}
