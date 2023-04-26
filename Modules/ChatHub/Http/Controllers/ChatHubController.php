<?php

namespace Modules\ChatHub\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use MyCore\Helper\OpensslCrypt;
use Modules\ChatHub\Models\BOBrandTable;

class ChatHubController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    protected $brand;
    public function __construct(
        BOBrandTable $brand
    ) {
        $this->brand = $brand;
    }
    public function index(Request $request)
    {
        $brand_contr=$this->brand->getBrandCode($request['tenant_id']);
        $oConstr = new OpensslCrypt(env('OP_SECRET'), env('OP_SALT'));
        $conStr = $oConstr->decode($brand_contr);
        return response()->json([
            'error' => false,
            'data' => $conStr
        ]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('chathub::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {
    }

    /**
     * Show the specified resource.
     * @return Response
     */
    public function show()
    {
        return view('chathub::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit()
    {
        return view('chathub::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update(Request $request)
    {
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy()
    {
    }
}
