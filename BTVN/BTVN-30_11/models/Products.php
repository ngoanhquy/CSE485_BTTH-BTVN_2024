<?php
class Product
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function getAll()
    {
        $stmt = $this->pdo->prepare("SELECT * FROM product");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM product WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC); 
    }

    public function create($name, $price)
    {
        $stmt = $this->pdo->prepare("INSERT INTO product (name, price) VALUES (?, ?)");
        return $stmt->execute([$name, $price]);
    }
    public function update($id, $name, $price)
    {
        
        $stmt = $this->pdo->prepare("UPDATE product SET name = ?, price = ? WHERE id = ?");
        return $stmt->execute([$name, $price, $id]);
    }
    
    public function delete($id)
    {
        $stmt = $this->pdo->prepare("DELETE FROM product WHERE id = ?");
        return $stmt->execute([$id]);
    }
}
?>
