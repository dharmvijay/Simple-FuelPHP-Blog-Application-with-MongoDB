<?php
//use Orm\Model;

class Model_Blog extends Model
{
	protected static $_properties = array(
		'id',
		'title',
		'content',
		'created_at',
		'updated_at',
	);

	protected static $_observers = array(
		'Orm\Observer_CreatedAt' => array(
			'events' => array('before_insert'),
			'mysql_timestamp' => false,
		),
		'Orm\Observer_UpdatedAt' => array(
			'events' => array('before_save'),
			'mysql_timestamp' => false,
		),
	);

	public static function validate($factory)
	{
		$val = Validation::forge($factory);
		$val->add_field('title', 'Title', 'required|max_length[255]');
		$val->add_field('content', 'Content', 'required');

		return $val;
	}
    public static function nextId($data)
	{
        // Get an instance
        $mongodb = \Mongo_Db::instance();
        // Just select these fields
        $mongodb->select(array(
            '_id',
        ));
        $val = max($mongodb->get('blog'));
		return $val;
	}
    public static function getBlogs($data)
	{
        // Get an instance
        $mongodb = \Mongo_Db::instance();
        $blogs = $mongodb->get($data);
        return $blogs;
    } 
    public static function getBlog($data,$id)
	{
        // Get an instance.
        $mongodb = \Mongo_Db::instance();

        $mongodb->where(array(
            '_id' => (int)$id
        ));
        $mycol = $mongodb->get('blog');
        foreach($mycol as $blog)
        {
                $result =$blog;
        }
        return $result;
    }
    public static function insertBlog($data,$_id)
	{
        $mongodb = \Mongo_Db::instance();
        // Insert a new blog data
        $insert_id = $mongodb->insert($data, array(
            '_id' => $_id['_id']+1,
            'title' => Input::post('title'),
            'content' => Input::post('content'),
        ));
        return $insert_id;
    }
    public static function updateBlog($data,$id)
	{
        // Get an instance
        $mongodb = \Mongo_Db::instance();
        // Update a blog data
        $bool = $mongodb->where(array('_id' => (int)$id))->update($data, array(
            'title' => Input::post('title'),
            'content' => Input::post('content'),
        ));
        return $bool;
        
    }
    public static function deleteBlog($data,$id)
	{
        // Get an instance
        $mongodb = \Mongo_Db::instance();

        // Delete a blog entry where _id
        $bool = $mongodb->where(array('_id' => (int)$id))->delete($data);
        return $bool;
    }

}
