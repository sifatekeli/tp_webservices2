<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\BrowserKit\Response;
use Symfony\Component\HttpFoundation\Request;
use \PDO;
use AppBundle\Entity\Book;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;

use Symfony\Component\HttpFoundation\JsonResponse;


class AdvertController extends Controller
{



    /**
     * @Route("/", name="homepage")
     */
    public function LivresAction(Request $request) {

        $dbh = new PDO('mysql:host=localhost;dbname=mediatheque', "root", "", array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        date_default_timezone_set("Europe/Paris");
        $dbh->exec("SET CHARACTER SET utf8");
        $rep = $dbh->query("SELECT * FROM book;");

        $books = array();
        while ($data = $rep->fetch(PDO::FETCH_ASSOC)){
            array_push($books, new Book($data['id'], $data['name'], $data['category'])) ;
        }

        return new JsonResponse($books);
        //return $this->render('default/livres.html.twig');
    }


    public function LivreAction($id) {

        $dbh = new PDO('mysql:host=localhost;dbname=mediatheque', "root", "", array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        date_default_timezone_set("Europe/Paris");
        $dbh->exec("SET CHARACTER SET utf8");

        $rep = $dbh->prepare("SELECT * FROM book WHERE id = ?;");
        $rep-> execute(array($id));
        $book = $rep->fetch(PDO::FETCH_ASSOC);


        return new JsonResponse($book);
        //return $this->render('default/livre.html.twig');
    }

    public function PostAction(Request $request) {

        echo "aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa";

        $parametersAsArray = [];
        if ($content = $request->getContent()) {
            $parametersAsArray = json_decode($content, true);
        }

        $name = $parametersAsArray['name'];
        $category = $parametersAsArray['category'];

        $dbh = new PDO('mysql:host=localhost;dbname=mediatheque', "root", "", array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        date_default_timezone_set("Europe/Paris");
        $dbh->exec("SET CHARACTER SET utf8");

        $dbh->exec("INSERT INTO book values (DEFAULT, '".$name."', '".$category."')");

        return new JsonResponse("OK");

       // return $this->render('default/post.html.twig');
    }

    public function DeleteAction($id) {

        $dbh = new PDO('mysql:host=localhost;dbname=mediatheque', "root", "", array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        date_default_timezone_set("Europe/Paris");
        $dbh->exec("SET CHARACTER SET utf8");

        $dbh->exec("DELETE FROM book WHERE id=".$id);

        return new JsonResponse($id);

        //return $this->render('default/post.html.twig');
    }

    public function PutAction(Request $request) {

        $parametersAsArray = [];
        if ($content = $request->getContent()) {
            $parametersAsArray = json_decode($content, true);
        }

        $id = $parametersAsArray['id'];
        $name = $parametersAsArray['name'];
        $category = $parametersAsArray['category'];

        $dbh = new PDO('mysql:host=localhost;dbname=mediatheque', "root", "", array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        date_default_timezone_set("Europe/Paris");
        $dbh->exec("SET CHARACTER SET utf8");

        $dbh->exec("UPDATE book SET name = '".$name."', category = '".$category."' WHERE id =".$id);

        return new JsonResponse($id);

        //return $this->render('default/post.html.twig');
    }

    public function memberBooksAction($id){
        $dbh = new PDO('mysql:host=localhost;dbname=mediatheque', "root", "", array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        date_default_timezone_set("Europe/Paris");
        $dbh->exec("SET CHARACTER SET utf8");

        $rep = $dbh->prepare("SELECT * FROM book b, member m WHERE b.id = m.idBook AND m.id = ?;");
        $rep-> execute(array($id));
        //$book = $rep->fetch(PDO::FETCH_ASSOC);

        $books = array();
        while ($data = $rep->fetch(PDO::FETCH_ASSOC)){
            array_push($books, new Book($data['id'], $data['name'], $data['category'])) ;
        }

        return new JsonResponse($books);
    }


}
