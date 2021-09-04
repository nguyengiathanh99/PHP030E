<?php
require_once 'models/Model.php';

class Product extends Model
{

  public $id;
  public $category_id;
  public $title;
  public $avatar;
  public $price;
  public $amount;
  public $summary;
  public $content;
  public $status;
  public $created_at;
  public $updated_at;

  /**
   * Lấy thông tin của sản phẩm đang có trên hệ thống
   * @return array
   */
  public function getAll($params = [])
  {
      // Tạo 1 chuỗi search 
      // + Tạo ra 1 chuỗi search với giá trị là WHERE TRUE, để vc kết nối chuỗi với các key
      // search dc đơn giản hơn
      $str_seach = 'WHERE TRUE';
      // + Xử lý trường hợp search thì sẽ thay đổi lại giá trị của chuỗi search ban đầu
      if (isset($params['category_id']) && $params['category_id'] != -1) {
        $category_id = $params['category_id'];
          $str_seach .= "AND products.category_id =  $category_id";
      }
      if (isset($params['name']) && !empty($params['name'])) {
            $name = $params['name'];
            // Truy vấn sử dụng LIKE sẽ rất chậm nếu như số lượng bản ghi nhiều, thực tế
            // sẽ ít khi dùng LIKE để thực hiện chức năng search do k tận dụng dc cơ chế
            // index dữ liệu trong CSD, thực tế sẽ dùng search theo kiểu fulltext MATCH...AGAINST

            $str_seach .= "AND products.title LIKE '%$name%'";
      }
      if (isset($params['price']) && !empty($params['price'])) {
          $price = $params['price'];
          $str_seach .= "AND products.price LIKE '%$price%'";
      }
        echo "<pre>";
        print_r($params);
        echo "</pre>";
        // "WHERE category_id = 1 AND name LIKE 'abc' AND price LIKE '12121'";
        // Hiển thị 1 chuỗi search trên trong câu truy vấn
    $obj_select = $this->connection
      ->prepare("SELECT products.*, categories.name AS category_name FROM products 
                        INNER JOIN categories ON categories.id = products.category_id
                        $str_seach
                        ORDER BY products.created_at DESC
                        ");

    $arr_select = [];
    $obj_select->execute($arr_select);
    $products = $obj_select->fetchAll(PDO::FETCH_ASSOC);

    return $products;
  }

  /**
   * Lấy thông tin của sản phẩm đang có trên hệ thống
   * @param array Mảng các tham số phân trang
   * @return array
   */
  public function getAllPagination()
  {
    $obj_select = $this->connection
      ->prepare("SELECT products.*, categories.name AS category_name FROM products 
                        INNER JOIN categories ON categories.id = products.category_id    
                        ORDER BY products.updated_at DESC, products.created_at DESC
                        ");

    $obj_select->execute();
    $products = $obj_select->fetchAll(PDO::FETCH_ASSOC);

    return $products;
  }

  /**
   * Tính tổng số bản ghi đang có trong bảng products
   * @return mixed
   */
  public function countTotal()
  {
    $obj_select = $this->connection->prepare("SELECT COUNT(id) FROM products");
    $obj_select->execute();

    return $obj_select->fetchColumn();
  }

  /**
   * Insert dữ liệu vào bảng products
   * @return bool
   */
  public function insert()
  {
    $obj_insert = $this->connection
      ->prepare("INSERT INTO products(category_id, title, avatar, price, amount, summary, content, status) 
                                VALUES (:category_id, :title, :avatar, :price, :amount, :summary, :content, :status)");
    $arr_insert = [
      ':category_id' => $this->category_id,
      ':title' => $this->title,
      ':avatar' => $this->avatar,
      ':price' => $this->price,
      ':amount' => $this->amount,
      ':summary' => $this->summary,
      ':content' => $this->content,
      ':status' => $this->status,
    ];
    return $obj_insert->execute($arr_insert);
  }

  /**
   * Lấy thông tin sản phẩm theo id
   * @param $id
   * @return mixed
   */
  public function getById($id)
  {
    $obj_select = $this->connection
      ->prepare("SELECT products.*, categories.name AS category_name FROM products 
          INNER JOIN categories ON products.category_id = categories.id WHERE products.id = $id");

    $obj_select->execute();
    return $obj_select->fetch(PDO::FETCH_ASSOC);
  }


  public function update($id)
  {
    $obj_update = $this->connection
      ->prepare("UPDATE products SET category_id=:category_id, title=:title, avatar=:avatar, price=:price,amount=:amount 
            summary=:summary, content=:content, status=:status, updated_at=:updated_at WHERE id = $id
");
    $arr_update = [
      ':category_id' => $this->category_id,
      ':title' => $this->title,
      ':avatar' => $this->avatar,
      ':price' => $this->price,
      ':amount' => $this->amount,
      ':summary' => $this->summary,
      ':content' => $this->content,
      ':status' => $this->status,
      ':updated_at' => $this->updated_at,
    ];
    return $obj_update->execute($arr_update);
  }

  public function delete($id)
  {
    $obj_delete = $this->connection
      ->prepare("DELETE FROM products WHERE id = $id");
    return $obj_delete->execute();
  }
}