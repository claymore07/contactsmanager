<?php
/**
 * Created by PhpStorm.
 * User: Luffy
 * Date: 9/21/2017
 * Time: 6:34 PM
 */

function listGroups($userId)
{
    return DB::table('groups')

        ->join('contacts', 'contacts.group_id', '=', 'groups.id')
        ->where('contacts.user_id', $userId)
        ->select('groups.*', DB::raw('count(contacts.id) as total'))
        ->groupBy('contacts.group_id')
        ->get();
}