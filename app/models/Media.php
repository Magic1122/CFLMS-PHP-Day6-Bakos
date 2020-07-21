<?php
class Media
{
    private $db;

    public function __construct()
    {

        $this->db = new Database;
    }

    /* Gets all the medias */

    public function getMedias()
    {
        $this->db->query("SELECT 
                                media.media_id, 
                                media.isbn_asin, 
                                media.media_title, 
                                media.media_genre, 
                                media.media_status, 
                                media.media_img, 
                                media.fk_type_id
                                FROM media
                                ORDER BY media.fk_type_id AND media.media_title");

        $results = $this->db->resultSet();

        return $results;
    }

    public function searchMedias($search)
    {
        $search = strval($search);


        $this->db->query("SELECT 
                                media.media_id, 
                                media.isbn_asin, 
                                media.media_title, 
                                media.media_genre, 
                                media.media_status, 
                                media.media_img, 
                                media.fk_type_id
                                FROM media
                                WHERE media.media_title LIKE '%$search%'
                                ORDER BY media.fk_type_id AND media.media_title;");
        

        $results = $this->db->resultSet();

        return $results;
    }

    /* Getis a media by its id */

    public function getMediaById($id)
    {
        // Query

        $this->db->query("SELECT 
                media.media_id, 
                media.isbn_asin, 
                media.media_title, 
                media.media_genre, 
                media.media_status, 
                media.media_description, 
                media.media_img, 
                media.media_published_year,
                media.created_at, 
                fk_author_id, 
                fk_publisher_id, 
                media.fk_type_id, 
                publisher.publisher_name, 
                publisher.publisher_address,
                publisher.publisher_zip,
                publisher.publisher_city,
                type.type, 
                author.author_fname, 
                author.author_lname, 
                users.name
                FROM media
                JOIN publisher ON publisher.publisher_id = media.fk_publisher_id 
                JOIN author ON author.author_id = media.fk_author_id 
                JOIN type ON type.type_id = media.fk_type_id
                JOIN users ON media.fk_user_id = users.id
                WHERE media.media_id = :id
                ");

        // Bind value
        $this->db->bind(':id', $id);

        $row = $this->db->single();

        return $row;
    }

    // Gets the medias by its publisher

    public function getMediasByPublisher($id)
    {
        $this->db->query("SELECT 
                                media.media_id, 
                                media.isbn_asin, 
                                media.media_title, 
                                media.media_genre, 
                                media.media_status, 
                                media.media_img, 
                                media.fk_type_id, 
                                publisher.publisher_name
                                FROM media
                                JOIN publisher ON media.fk_publisher_id = publisher.publisher_id
                                WHERE media.fk_publisher_id = $id
                                ORDER BY media.fk_type_id AND media.media_title");

        $results = $this->db->resultSet();

        return $results;
    }

    // Gets all publishers

    public function getPublishers() {

        $this->db->query(
        "SELECT *
        FROM publisher
        ORDER BY publisher_name
        ");

    $results = $this->db->resultSet();

    return $results;
    }

    // Gets all authors

    public function getAuthors() {

        $this->db->query(
            "SELECT *
            FROM author
            ORDER BY author_fname
            ");
    
        $results = $this->db->resultSet();
    
        return $results;
    }

    // Adds a media to the database

    public function addMedia($data) {

        $user_id = $_SESSION['user_id'];
        $isbn_asin = $data['isbn_asin'];
        $media_title = $data['title'];
        $media_description = $data['description'];
        $media_genre = $data['genre'];
        $media_img = $data['img'];
        $media_published_year = $data['year'];
        $fk_author_id = $data['author'];
        $fk_publisher_id = $data['publisher'];
        $fk_type_id = $data['type'];

        $this->db->query("INSERT INTO media(
                            isbn_asin, 
                            media_title, 
                            media_description, 
                            media_genre, 
                            media_img, 
                            media_published_year, 
                            fk_author_id, 
                            fk_publisher_id, 
                            fk_type_id, 
                            fk_user_id
                            )
                            VALUES(
                            :isbn_asin, 
                            :media_title, 
                            :media_description, 
                            :media_genre, 
                            :media_img, 
                            :media_published_year, 
                            :fk_author_id, 
                            :fk_publisher_id, 
                            :fk_type_id, 
                            :fk_user_id
                            )
                                            ");
        // Binding the values to the placeholders

        $this->db->bind(':isbn_asin', $isbn_asin);
        $this->db->bind(':media_title', $media_title); 
        $this->db->bind(':media_description', $media_description);
        $this->db->bind(':media_genre', $media_genre);
        $this->db->bind(':media_img', $media_img);
        $this->db->bind(':media_published_year', $media_published_year);
        $this->db->bind(':fk_author_id', $fk_author_id);
        $this->db->bind(':fk_publisher_id', $fk_publisher_id);
        $this->db->bind(':fk_type_id', $fk_type_id);
        $this->db->bind(':fk_user_id', $user_id);

        if($this->db->execute()){
            return true;
          } else {
            return false;
          }
    }

    public function updateMedia($data) {
        $media_id = $data['id']; 
        $isbn_asin = $data['isbn_asin'];
        $media_title = $data['title'];
        $media_description = $data['description'];
        $media_genre = $data['genre'];
        $media_img = $data['img'];
        $media_published_year = $data['year'];
        $media_status = $data['status'];
        $fk_author_id = $data['author'];
        $fk_publisher_id = $data['publisher'];
        $fk_type_id = $data['type'];        

        $this->db->query("UPDATE media SET
                            isbn_asin = :isbn_asin, 
                            media_title = :media_title, 
                            media_description = :media_description, 
                            media_genre = :media_genre, 
                            media_img = :media_img, 
                            media_published_year = :media_published_year, 
                            media_status = :media_status, 
                            fk_author_id = :fk_author_id, 
                            fk_publisher_id = :fk_publisher_id, 
                            fk_type_id = :fk_type_id
                            WHERE media_id = :media_id");
        
        // Binding the values

        $this->db->bind(':media_id', $media_id);
        $this->db->bind(':isbn_asin', $isbn_asin);
        $this->db->bind(':media_title', $media_title); 
        $this->db->bind(':media_description', $media_description);
        $this->db->bind(':media_genre', $media_genre);
        $this->db->bind(':media_img', $media_img);
        $this->db->bind(':media_published_year', $media_published_year);
        $this->db->bind(':media_status', $media_status);
        $this->db->bind(':fk_author_id', $fk_author_id);
        $this->db->bind(':fk_publisher_id', $fk_publisher_id);
        $this->db->bind(':fk_type_id', $fk_type_id);

        if($this->db->execute()){
            return true;
          } else {
            return false;
          }

    }

    // Deletes a media by its id

    public function deleteMedia($id) {

        $this->db->query("DELETE FROM media WHERE media_id = :id");

        // Binding value
        $this->db->bind(':id', $id);

        // Execute
        if($this->db->execute()) {
            return true;
          } else {
            return false;
          }


    }

    // Adds a publisher

    public function addPublisher($data) {

        $publisher_name = $data['name'];
        $publisher_city = $data['city'];
        $publisher_address = $data['address'];
        $publisher_zip = $data['zip'];
        $publisher_size = $data['type'];

        $this->db->query("INSERT INTO publisher(
            publisher_name, 
            publisher_city, 
            publisher_address, 
            publisher_zip, 
            publisher_size 
            )
            VALUES(
            :publisher_name, 
            :publisher_city, 
            :publisher_address, 
            :publisher_zip, 
            :publisher_size 
            )
                            ");

        $this->db->bind(':publisher_name', $publisher_name);
        $this->db->bind(':publisher_city', $publisher_city);
        $this->db->bind(':publisher_address', $publisher_address);
        $this->db->bind(':publisher_zip', $publisher_zip);
        $this->db->bind(':publisher_size', $publisher_size);

        if($this->db->execute()){
            return true;
          } else {
            return false;
          }

    }

    // Adds an author

    public function addAuthor($data) {

        $author_fname = $data['fname'];
        $author_lname = $data['lname'];

        $this->db->query("INSERT INTO author(
            author_fname, 
            author_lname 
            )
            VALUES(
            :author_fname, 
            :author_lname 
            )
                            ");

        $this->db->bind(':author_fname', $author_fname);
        $this->db->bind(':author_lname', $author_lname);



        if($this->db->execute()){
            return true;
          } else {
            return false;
          }


    }
}
