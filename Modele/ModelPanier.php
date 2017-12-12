<?php
  require_once File::build_path(array("Modele","Model.php"));
  

  class ModelPanier{
    private $idProduit;
    private $idUtil;
    private $quantite;
    
    
    //Guetters et Setters
    public function getIdProduit(){
      return $this->idProduit;
    }
    public function getIdUtil(){
      return $this->idUtil;
    }
    public function getQuantite(){
      return $this->Quantite;
    }
      
    public function setIdProduit($idProduit2){
      $this->idProduit=$idProduit2;
    }
    
    public function setIdUtil($idUtil2){
      $this->idUtil=$idUtil2;
    }
    public function setQuantite($quantite2){
      $this->quantite=$quantite2;
    }
    
    public static function getQuantiteById($idUtili,$idProduit)
    {
          $rep = Model::$pdo->query("SELECT Quantite FROM Panier WHERE idUtil=$idUtili AND idProduit=$idProduit");
          $quant=$rep->fetch();
          $rep->closeCursor();
          return $quant[0];
         
    }
    
    //Constructeur
    public function __construct($idProd = NULL, $idUt = NULL, $quant = NULL){
      if (!is_null($idProd) && !is_null($idUt) && !is_null($quant)) {
        $this->idProduit = $idProd;
        $this->idUtil = $idUt;
        $this->quantite = $quant;
      }
    }
    
    //Fonctions
    
    public static function getProduitDuPanier($idProd)
    {
        $produit=ModelProduit::getProduitbyId($idProd);
        return $produit;
        
    }
    
    
    public static function getAllProduitDuPanier($idUtili){
      $rep = Model::$pdo->query("SELECT idProduit,Quantite FROM Panier WHERE idUtil=$idUtili");
      $rep->setFetchMode(PDO::FETCH_CLASS,'ModelPanier');
      $tab_obj = $rep->fetchAll();
      return $tab_obj;
    }

    public static function deleteProduitById($idProduit,$idUtili){
      $quant=ModelPanier::getQuantiteById($idUtili, $idProduit);
      $rep = Model::$pdo->query("DELETE FROM Panier WHERE idProduit=$idProduit AND idUtil=$idUtili");
      $sql = Model::$pdo->query("UPDATE Produit SET quantiteProdStock=quantiteProdStock+$quant WHERE idProduit=$idProduit");
      $sql->closeCursor();
      $rep->closeCursor();

    }
    
    public static function incrementeQuantite($idProduit,$idUtil)
    {
        $produit= ModelProduit::getProduitbyId($idProduit);
        $quantStock=$produit->getQuantiteProdStock();
        if($quantStock>0)
        {
        $rep = Model::$pdo->query("UPDATE Panier SET Quantite=Quantite+1 WHERE idProduit=$idProduit AND idUtil=$idUtil");
        $sql = Model::$pdo->query("UPDATE Produit SET quantiteProdStock=quantiteProdStock-1 WHERE idProduit=$idProduit");
        $sql->closeCursor();
        $rep->closeCursor();
        }
        else
        {
           echo '<script>alert("Il ne reste plus de ce produit en stock!")</script>';
        }
    }
    
    public static function decrementeQuantite($idProduit,$idUtil)
    {
        if(ModelPanier::getQuantiteById($idUtil,$idProduit)==1)
        {
            ModelPanier::deleteProduitById($idProduit, $idUtil);
        }
        else
        {
        $rep = Model::$pdo->query("UPDATE Panier SET Quantite=Quantite-1 WHERE idProduit=$idProduit AND idUtil=$idUtil");
        $rep->closeCursor();
        }
        $sql = Model::$pdo->query("UPDATE Produit SET quantiteProdStock=quantiteProdStock+1 WHERE idProduit=$idProduit");
        $sql->closeCursor();
        
    }
    
    public static function aDejaProd($idUtili,$idProduit)
    {
        $rep= Model::$pdo->query("SELECT idProduit FROM Panier WHERE idUtil=$idUtili AND idProduit=$idProduit");
        $adeja = $rep->fetch();
        $rep->closeCursor();
        if($adeja[0]==0)
        {
            return false;
        }
        return true;
    }
    
    
    
    public static function update($idUtili,$idProduit,$quantiteProd)
    {
        $sql = Model::$pdo->query("UPDATE Panier SET Quantite=Quantite+$quantiteProd WHERE idProduit=$idProduit AND idUtil=$idUtili");
        $sql->closeCursor();
    }
    
    public function save(){
      $sql = "INSERT INTO Panier (idProduit,idUtil,Quantite) VALUES (:idProduit,:idUtil,:quantite)";
      $sql_prod = Model::$pdo->query("UPDATE Produit SET quantiteProdStock=quantiteProdStock-$this->quantite WHERE idProduit=$this->idProduit");
      $sql_prod->closeCursor();
      $req_prep = Model::$pdo->prepare($sql);
      $values = array(
        "idProduit" => $this->idProduit,
        "idUtil" => $this->idUtil,
        "quantite" => $this->quantite,
      );
      $req_prep->execute($values);
    }
  }
    
?>
