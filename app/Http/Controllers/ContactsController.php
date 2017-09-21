<?php

namespace App\Http\Controllers;

use App\Category;
use App\Contact;
use App\Group;
use App\Http\Requests\ContactCreateRequest;
use File;
use Illuminate\Http\Request;

class ContactsController extends Controller
{
    private $userImagePath = 'images';
    private $defaultImage = 'default_user.jpg';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $user_id =1;
        $contacts = Contact::where(function($query) use ($request, $user_id) {
            if( ($term = $request->get("term")) ) {
                $name = explode(" ",$term,2);
                if(count($name)>1){
                    $fname=$name[0];
                    $lname=$name[1];
                    $query->orWhere("fname", 'LIKE', $fname);
                    $query->orWhere("lname", 'LIKE', $lname);
                }else {
                    $keywords = '%' . $term . '%';
                    $query->orWhere("name", 'LIKE', $keywords);
                    $query->orWhere("company", 'LIKE', $keywords);
                    $query->orWhere("email", 'LIKE', $keywords);
                }
            }

            if ($groupId = ($request->get('group_id'))) {
                $query->where('group_id', $groupId);
            }
        })
            ->where("user_id", $user_id)
            ->orderBy('id', 'desc')
            ->paginate(4);

        return view('contacts.index', compact('contacts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categories = Category::pluck('name', 'id')->all();
        $groups = Group::pluck('name', 'id')->all();
        return view('contacts.create', compact('groups', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ContactCreateRequest|\app\Http\requests\ContactCreateRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(ContactCreateRequest $request)
    {
        //

        $input = $request->all();

        $emails = $request->emails;
        $phones = $request->phones;
        $category_ids = $request->category_ids;

        $input['user_id'] = 1;
        if ($photo = $request->file('photo')) {
            $path = public_path() . '/images';
            $fileName = time() . $photo->getClientOriginalName();
            $photo->move($path, $fileName);
            $input['path'] = $fileName;


            $contact = Contact::create($input);
        } else {
            $fileName = time() . $this->defaultImage;
            File::copy($this->userImagePath . '/' . $this->defaultImage, $this->userImagePath . '/' . $fileName);
            $input['path'] = $fileName;
            $contact = Contact::create($input);
        }
        $email['email'] = $input['email'];
        $contact->emails()->create($email);
        if ($emails != null) {
            $emailInput[] = '';
            foreach ($emails as $email) {
                $emailInput['email'] = $email;
                $contact->emails()->create($emailInput);
            }
        }

        $phone['phone'] = $input['phone'];

        $phone['category_id'] = $input['category_id'];

        $contact->phones()->create($phone);


        if (($phones != null) && ($category_ids != null)) {

            foreach ($phones as $phone => $value) {
                $Input['category_id'] = $category_ids[$phone];
                $Input['phone'] = $phones[$phone];

                $contact->phones()->create($Input);
            }
        }
        return redirect('/contacts/')->with('message', 'افزودن کاربر جدید با موفقیت انجام شد.');

    }

    public function contactFormValidation(ContactCreateRequest $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //

        $contact = Contact::findOrFail($id);
        return view('contacts.show', compact('contact'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $categories = Category::pluck('name', 'id')->all();
        $groups = Group::pluck('name', 'id')->all();
        $contact = Contact::findOrFail($id);
        return view('contacts.edit', compact('contact','categories','groups'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $contact = Contact::findOrFail($id);
        $input = $request->all();


        //**** emails list update procedure
        $email = $request->email;
        $email_id = $request->email_id;
        $emails = $request->emails;
        $email_ids = $request->email_ids;
        // updating the original email address
        $contact->emails()->whereId($email_id)->update(['email'=>$email]);
        // updating other email addresses
        if(count($email_ids)>0){
            foreach ($email_ids as $index => $value){
                $contact->emails()->whereId($email_ids[$index])->update(['email'=>$emails[$index]]);
            }
        }
        // if new email address has been added, creates email address
        if(count($emails)>0){
            $emails = array_slice($emails,count($email_ids));
            foreach ($emails as $index => $value){
                $contact->emails()->create(['email'=>$emails[$index]]);
            }
        }
        // if any previous email address deleted, it will be deleted from DB
        if(count($request->deleted_email_ids)>0){
            $contact->emails()->whereIn('id', $request->deleted_email_ids)->delete();
        }



        //**** phones list update procedure
        $phones = $request->phones;
        $phone_ids = $request->phone_ids;
        $category_ids = $request->category_ids;
        $phone = $request->phone;
        $category_id = $request->category_id;
        $phone_id = $request->phone_id;
        // updating the original phone number
        $contact->phones()->whereId($phone_id)->update(['phone'=>$phone, 'category_id'=> $category_id ]);

        // updating other phone numbers
        if(count($phone_ids)>0) {
            foreach ($phone_ids as $index => $value) {
                echo $phone_ids[$index];
                $contact->phones()->whereId($phone_ids[$index])->update(['phone' => $phones[$index], 'category_id' => $category_ids[$index]]);
            }
        }

        // if new numbers has been added, creates new phone numbers
        if(count($phones)>0) {
            $phones = array_slice($phones,count($phone_ids));
            $category_ids = array_slice($category_ids,count($phone_ids));

            foreach ($phones as $index => $value) {
                $contact->phones()->create(['contact_id' => $contact->id, 'phone' => $phones[$index], 'category_id' => $category_ids[$index]]);
            }
        }
        // if any previous phone deleted, it will be deleted from DB
        if(count($request->deleted_phone_ids)>0){
            $contact->phones()->whereIn('id', $request->deleted_phone_ids)->delete();
        }
        //******* End of phones' list update


        if ($photo = $request->file('photo')) {
            $path = public_path() . '/images';
            $fileName = time() . $photo->getClientOriginalName();
            $photo->move($path, $fileName);
            $input['path'] = $fileName;

            if($contact->path != null){

                if (File::exists($path .'/'. $contact->path)) {
                    unlink($path.'/' . $contact->path);
                }
            }

            $contact->update($input);
        } else {
            $contact->update($input);
        }



        return redirect('/contacts/')->with('message','بروزرسانی شد');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    public function autoComplete(Request $request){
        if($request->ajax()){
            return Contact::select(['id','user_id','fname as value', 'lname as lname'])->where('user_id','=',1)->where(function($query) use ($request){

                if(($term = $request->get('term'))){

                    $keywords = '%'.$term.'%';

                    $query->orWhere("fname",'LIKE',$keywords);
                    $query->orWhere("lname",'LIKE',$keywords);



                }
            })->orderBy('fname','asc')->take(5)->get();
        }

    }
}
