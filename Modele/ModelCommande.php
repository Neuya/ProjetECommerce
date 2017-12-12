<?php 

require_once File::build_path(array("Modele","Model.php"));
  

  class ModelCommande{
    
    private $idCommande;
    private $idProduit;
    private $idUtil;
    private $quantiteProduit;
    
    
    
    //Guetters et Setters
    
    public function getIdCommande()
    {
        return $this->idCommande;
    }
    public function getIdProduit(){
      return $this->idProduit;
    }
    public function getIdUtil(){
      return $this->idUtil;
    }
    public function getQuantite(){
      return $this->quantiteProduit;
    }
      
    public function setIdProduit($idProduit2){
      $this->idProduit=$idProduit2;
    }
    
    public function setIdUtil($idUtil2){
      $this->idUtil=$idUtil2;
    }
    public function setQuantite($quantite2){
      $this->quantiteProduit=$quantite2;
    }
    
    public function setIdCommande($id)
    {
        $this->idCommande=$id;
    }
    
    //Constructeur
    public function __construct($idCom=NULL,$idProd = NULL, $idUt = NULL, $quant = NULL){
      if (!is_null($idCom) && !is_null($idProd) && !is_null($idUt) && !is_null($quant)) {
        $this->idCommande=$idCom;
        $this->idProduit = $idProd;
        $this->idUtil = $idUt;
        $this->quantiteProduit = $quant;
      }
    }
    
    //Fonctions
    
    public static function getAllCommande($idUtili)
    {
      $rep = Model::$pdo->query("SELECT DISTINCT idCommande FROM Commande WHERE idUtil=$idUtili");
      $rep->setFetchMode(PDO::FETCH_CLASS, 'ModelCommande');
      $tab_obj = $rep->fetchAll();
      return $tab_obj;
    }
    
    public static function getAllProduitCommande($idCom,$idUtili){
      $rep = Model::$pdo->query("SELECT idProduit FROM Commande WHERE idUtil=$idUtili AND idCommande=$idCom");
      $rep->setFetchMode(PDO::FETCH_CLASS, 'ModelCommande');
      $tab_obj = $rep->fetchAll();
      return $tab_obj;
    }
    
    public static function getQuantiteProdDeCommande($idCom,$idUtili,$idProduit){
      $rep = Model::$pdo->query("SELECT quantiteProduit FROM Commande WHERE idUtil=$idUtili AND idCommande=$idCom AND idProduit=$idProduit");
      $tab_obj = $rep->fetch();
      return $tab_obj[0];
    }

    public static function getIdCommandeDeUtil($idUtili)
    {
        $rep = Model::$pdo->query("SELECT COUNT(DISTINCT idCommande) FROM Commande WHERE idUtil=$idUtili");
        $nombreCom = $rep->fetch();
        $rep->closeCursor();
        return $nombreCom[0];
    }
    
    public static function enleveStock($idProduit,$quantite)
    {
        $sql=Model::$pdo->query("UPDATE Produit SET quantiteProdStock=quantiteProdStock-$quantite WHERE idProduit=$idProduit");
        $sql->closeCursor();
    }
    
    
    public function save(){
      $sql = "INSERT INTO Commande (idCommande,idProduit,idUtil,quantiteProduit) VALUES (:idCommande,:idProduit,:idUtil,:quantite)";
      $req_prep = Model::$pdo->prepare($sql);
      $values = array(
        "idCommande" => $this->idCommande,
        "idProduit" => $this->idProduit,
        "idUtil" => $this->idUtil,
        "quantite" => $this->quantiteProduit,
      );
      $req_prep->execute($values);
    }
    
  }
    