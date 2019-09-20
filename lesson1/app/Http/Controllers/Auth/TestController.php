  public function index()
    {
        $test = Test::paginate(10);
        return view('admin.test.index', compact('test'));
    }
 
    // create
    public function create()
    {
        return view('admin.test.create');
    }
 
    // store 
    public function store(Request $request)
    {
        $data = 
        [
            'first_name' => $request->firstname,
            'last_name'  => $request->lastname,
        ];
        Test::create($data);
 
        return back()->with('success', 'Thêm mới dữ liệu thành công');
    }
 
    // edit
    public function edit($id)
    {
        $test = Test::findOrFail($id);
        return view('admin.test.edit', compact('test'));
    }
 
    // update
    public function update($id, Request $request)
    {
        $test = Test::findOrFail($id);
        $test->first_name   = $request->first_name;
        $test->last_name    = $request->last_name;
        $test->save();
 
        return back()->with('success', 'Cập nhật dữ liệu thành công');
    }
 
    // delete
    public function destroy($id)
    {
        Test::destroy($id);
        return back()->with('success', 'Xóa dữ liệu thành công');
    }