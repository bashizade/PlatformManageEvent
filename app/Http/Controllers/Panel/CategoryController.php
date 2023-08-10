<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Http\Requests\Panel\Category\CategoryCreateRequest;
use App\Http\Requests\Panel\Category\CategoryDeleteRequest;
use App\Http\Requests\Panel\Category\CategoryUpdateRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::query()->where('status',1)->get();

        return view('panel.categories',compact('categories'));
    }

    public function create(CategoryCreateRequest $request)
    {
        $validate_data = $request->validated();
        $validate_data['status'] = 1;

        Category::query()->create($validate_data);

        $this->show_message('دسته با موفقیت ساخته شد');

        return redirect(route('panel.category.index'));
    }

    public function update(CategoryUpdateRequest $request, Category $category)
    {
        $validate_data = $request->validated();

        $category->update($validate_data);

        $this->show_message('دسته با موفقیت ویرایش شد');

        return redirect(route('panel.category.index'));
    }

    public function delete(CategoryDeleteRequest $request, Category $category)
    {
        $category->update([
            'status' => 2
        ]);

        $this->show_message('دسته با موفقیت حذف شد');

        return redirect(route('panel.category.index'));
    }
}
