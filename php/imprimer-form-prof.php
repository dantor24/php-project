<?php
// Connexion à la BDD (à personnaliser)
include_once("../DBConnection/Connect.php");

// Appel de la librairie FPDF
require('fpdf184/fpdf.php');

// Création de la class PDF
class PDF extends FPDF {
	// Header
	function Header() { 
		// Logo : 8 >position à gauche du document (en mm), 2 >position en haut du document, 80 >largeur de l'image en mm). La hauteur est calculée automatiquement.
        $this->Image('../images/LOGOCH.png',8,2);
		// Saut de ligne 20 mm
		$this->Ln(20);

		// Titre gras (B) police Helbetica de 11
		$this->SetFont('Helvetica','B',11);
		// fond de couleur gris (valeurs en RGB)
		$this->setFillColor(230,230,230);
 		// position du coin supérieur gauche par rapport à la marge gauche (mm)
		$this->SetX(70);
		// Texte : 60 >largeur ligne, 8 >hauteur ligne. Premier 0 >pas de bordure, 1 >retour à la ligneensuite, C >centrer texte, 1> couleur de fond ok	
		$this->Cell(40,20,'Campus Henry Christophe de Limonade',0,1,1);
		$this->Cell(60,4,'Liste des professeurs du CHCL',0,1,'C');
		// Saut de ligne 10 mm
		$this->Ln(10);		
	}
	// Footer
	function Footer() {
		// Positionnement à 1,5 cm du bas
		$this->SetY(-15);
		// Police Arial italique 8
		$this->SetFont('Helvetica','I',9);
		// Numéro de page, centré (C)
		$this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
	}
}


// On active la classe une fois pour toutes les pages suivantes
// Format portrait (>P) ou paysage (>L), en mm (ou en points > pts), A4 (ou A5, etc.)
$pdf = new PDF('P','mm','A4');

// Nouvelle page A4 (incluant ici logo, titre et pied de page)
$pdf->AddPage();
// Polices par défaut : Helvetica taille 9
$pdf->SetFont('Helvetica','',9);
// Couleur par défaut : noir
$pdf->SetTextColor(0);
// Compteur de pages {nb}
$pdf->AliasNbPages();


// Sous-titre calées à gauche, texte gras (Bold), police de caractère 11
$pdf->SetFont('Helvetica','B',11);
// couleur de fond de la cellule : gris clair
$pdf->setFillColor(230,230,230);

$pdf->Ln(10); // saut de ligne 10mm	


// Fonction en-tête des tableaux en 3 colonnes de largeurs variables
function entete_table($position_entete) {
	global $pdf;
	$pdf->SetDrawColor(183); // Couleur du fond RVB
	$pdf->SetFillColor(221); // Couleur des filets RVB
	$pdf->SetTextColor(0); // Couleur du texte noir
	$pdf->SetY($position_entete);
	// position de colonne 1 (10mm à gauche)	
	$pdf->SetX(3);
	$pdf->Cell(8,8,'Code',1,0,'C',1);	// 60 >largeur colonne, 8 >hauteur colonne
	// position de la colonne 2 (70 = 10+60)
	$pdf->SetX(11); 
	$pdf->Cell(10,8,'Nom',1,0,'C',1);
	// position de la colonne 3 (130 = 70+60)
	$pdf->SetX(20); 
	$pdf->Cell(13,8,'Prenom',1,0,'C',1);
    // 
    // position de la colonne 3 (130 = 70+60)
	$pdf->SetX(30); 
	$pdf->Cell(10,8,'Sexe',1,0,'C',1);
    // position de la colonne 3 (130 = 70+60)
	$pdf->SetX(40); 
	$pdf->Cell(14,8,'Adresse',1,0,'C',1);
    // position de la colonne 3 (130 = 70+60)
	$pdf->SetX(50); 
	$pdf->Cell(16,8,'Telephone',1,0,'C',1);
    // position de la colonne 3 (130 = 70+60)
	$pdf->SetX(60); 
	$pdf->Cell(14,8,'Statut M.',1,0,'C',1);
    // position de la colonne 3 (130 = 70+60)
	$pdf->SetX(70); 
	$pdf->Cell(16,8,'Lieu naiss.',1,0,'C',1);
    // position de la colonne 3 (130 = 70+60)
	$pdf->SetX(80); 
	$pdf->Cell(22,8,'Date naiss.',1,0,'C',1);
    // position de la colonne 3 (130 = 70+60)
	$pdf->SetX(100); 
	$pdf->Cell(10,8,'Niveau',1,0,'C',1);

	// position de la colonne 3 (130 = 70+60)
	$pdf->SetX(110); 
	$pdf->Cell(20,8,'Cours enseig',1,0,'C',1);
	// position de la colonne 3 (130 = 70+60)
	$pdf->SetX(130); 
	$pdf->Cell(20,8,'Filieres aff.',1,0,'C',1);
	// position de la colonne 3 (130 = 70+60)
	$pdf->SetX(150); 
	$pdf->Cell(10,8,'Salaire',1,0,'C',1);
	// position de la colonne 3 (130 = 70+60)
	$pdf->SetX(160); 
	$pdf->Cell(10,8,'Poste',1,0,'C',1);
	// position de la colonne 3 (130 = 70+60)
	$pdf->SetX(170); 
	$pdf->Cell(10,8,'Email',1,0,'C',1);
	// position de la colonne 3 (130 = 70+60)
	$pdf->SetX(180); 
	$pdf->Cell(10,8,'Nif/Cin',1,0,'C',1);

	// position de la colonne 3 (130 = 70+60)
	$pdf->SetX(190); 
	$pdf->Cell(10,8,'Etat',1,0,'C',1);
	// position de la colonne 3 (130 = 70+60)
	$pdf->SetX(200); 
	$pdf->Cell(10,8,'Memo',1,0,'C',1);

	$pdf->Ln(); // Retour à la ligne
}
// AFFICHAGE EN-TÊTE DU TABLEAU
// Position ordonnée de l'entête en valeur absolue par rapport au sommet de la page (60 mm)
$position_entete = 70;
// police des caractères
$pdf->SetFont('Helvetica','',6);
$pdf->SetTextColor(0);
// on affiche les en-têtes du tableau
entete_table($position_entete);

$position_detail = 78; // Position ordonnée = $position_entete+hauteur de la cellule d'en-tête (60+8)
$query=$pdo->query('SELECT * FROM dossierprof');
$datas= $query->fetchAll();
foreach($datas as $data_visit) :
	// position abcisse de la colonne 1 (10mm du bord)
	$pdf->SetY($position_detail);
	$pdf->SetX(3);
	$pdf->MultiCell(8,8,utf8_decode($data_visit['Code']),'C');
    // position abcisse de la colonne 2 (70 = 10 + 60)	
	$pdf->SetY($position_detail);
	$pdf->SetX(10); 
	$pdf->MultiCell(10,8,utf8_decode($data_visit['Nom']),'C');
	// position abcisse de la colonne 3 (130 = 70+ 60)
	$pdf->SetY($position_detail);
	$pdf->SetX(20); 
	$pdf->MultiCell(13,8,$data_visit['Prenom'],'C');
	// 
	$pdf->SetY($position_detail);
	$pdf->SetX(30); 
	$pdf->MultiCell(10,8,$data_visit['Sexe'],'C');

	$pdf->SetY($position_detail);
	$pdf->SetX(40); 
	$pdf->MultiCell(10,8,$data_visit['Adresse'],'C');

	$pdf->SetY($position_detail);
	$pdf->SetX(50); 
	$pdf->MultiCell(10,8,$data_visit['Telephone'],'C');

	$pdf->SetY($position_detail);
	$pdf->SetX(60); 
	$pdf->MultiCell(10,8,$data_visit['Statut_Matrimonial'],'C');

	$pdf->SetY($position_detail);
	$pdf->SetX(70); 
	$pdf->MultiCell(10,8,$data_visit['Lieu_de_naissance'],'C');

	$pdf->SetY($position_detail);
	$pdf->SetX(80); 
	$pdf->MultiCell(20,8,$data_visit['Date_de_naissance'],'C');

	$pdf->SetY($position_detail);
	$pdf->SetX(100); 
	$pdf->MultiCell(10,8,$data_visit['Niveau'],'C');

	$pdf->SetY($position_detail);
	$pdf->SetX(110); 
	$pdf->MultiCell(20,8,$data_visit['Cours_a_enseigner'],'C');

	$pdf->SetY($position_detail);
	$pdf->SetX(130); 
	$pdf->MultiCell(20,8,$data_visit['Filieres_affectes'],'C');

	$pdf->SetY($position_detail);
	$pdf->SetX(150); 
	$pdf->MultiCell(10,8,$data_visit['Salaire'],'C');

	$pdf->SetY($position_detail);
	$pdf->SetX(160); 
	$pdf->MultiCell(10,8,$data_visit['Poste'],'C');

	$pdf->SetY($position_detail);
	$pdf->SetX(170); 
	$pdf->MultiCell(10,8,$data_visit['Email'],'C');

	$pdf->SetY($position_detail);
	$pdf->SetX(180); 
	$pdf->MultiCell(10,8,$data_visit['Nif_Cin'],'C');

	$pdf->SetY($position_detail);
	$pdf->SetX(190); 
	$pdf->MultiCell(10,8,$data_visit['Etat'],'C');

	$pdf->SetY($position_detail);
	$pdf->SetX(200); 
	$pdf->MultiCell(10,8,$data_visit['Memo'],'C');

	// on incrémente la position ordonnée de la ligne suivante (+8mm = hauteur des cellules)	
	$position_detail += 15; 
endforeach ;


// // Nouvelle page PDF
// $pdf->AddPage();
// // Polices par défaut : Helvetica taille 9
// $pdf->SetFont('Helvetica','',11);
// // Couleur par défaut : noir
// $pdf->SetTextColor(0);
// // Compteur de pages {nb}
// $pdf->AliasNbPages();


$pdf->Output('Professeurs.pdf','I'); // affichage à l'écran
// Ou export sur le serveur
// $pdf->Output('F', '../test.pdf');
?>
