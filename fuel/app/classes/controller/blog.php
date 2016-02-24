<?php
class Controller_Blog extends Controller_Template
{

	public function action_index()
	{
        $data['blogs'] = Model_Blog::getBlogs('blog');
        
		$this->template->title = "Blogs";
		$this->template->content = View::forge('blog/index', $data);

	}

	public function action_view($id = null)
	{
        $data['blog'] =Model_Blog::getBlog('blog',$id);
		is_null($id) and Response::redirect('blog');

		if ( ! $data['blog'])
		{
			Session::set_flash('error', 'Could not find blog #'.$id);
			Response::redirect('blog');
		}

		$this->template->title = "Blog";
		$this->template->content = View::forge('blog/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Blog::validate('create');

			if ($val->run())
			{
                // Get an instance
                $_id = Model_Blog::nextId('blog');

                $insert_id = Model_Blog::insertBlog('blog',$_id);

				if ($insert_id)
				{
					Session::set_flash('success', 'Added blog #'.$insert_id.'.');

					Response::redirect('blog');
				}

				else
				{
					Session::set_flash('error', 'Could not save blog.');
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Blogs";
		$this->template->content = View::forge('blog/create');

	}

	public function action_edit($id = null)
	{
        if (Input::method() == 'POST'){
            is_null($id) and Response::redirect('blog');
            $val = Model_Blog::validate('edit');

            if ($val->run())
            {
                $bool = Model_Blog::updateBlog('blog',$id);

                if ($bool)
                {
                    Session::set_flash('success', 'Updated blog #' . $id);

                    Response::redirect('blog');
                }

                else
                {
                    Session::set_flash('error', 'Could not update blog #' . $id);
                }
            }

            else
            {
                Session::set_flash('error', $val->error());
            }
            $data['blog'] =Model_Blog::getBlog('blog',$id);
            $this->template->title = "Blogs";
            $this->template->content = View::forge('blog/edit',$data);
        }else{
            $data['blog'] =Model_Blog::getBlog('blog',$id);
            $this->template->title = "Blogs";
            $this->template->content = View::forge('blog/edit',$data);
        }

	}

	public function action_delete($id = null)
	{
		is_null($id) and Response::redirect('blog');
        $bool = Model_Blog::deleteBlog('blog',$id);
		if ($bool)
		{
			Session::set_flash('success', 'Deleted blog #'.$id);
		}

		else
		{
			Session::set_flash('error', 'Could not delete blog #'.$id);
		}

		Response::redirect('blog');

	}

}
