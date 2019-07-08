<?php

namespace App\Controller;

use App\Entity\Persona;
use App\Form\PersonaType;
use App\Repository\PersonaRepository;
use App\Services\PersonaManager;
use phpDocumentor\Reflection\Types\This;
use phpDocumentor\Reflection\Types\Integer;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Encoder\JsonDecode;
use Symfony\Component\Serializer\Encoder\JsonEncode;
use FOS\RestBundle\Controller\Annotations as Rest;

/**
 * @Route("/persona")
 */
class PersonaController extends AbstractController
{
    /**
     * @var PersonaManager
     */
    private $personaManager;

    /**
     * PersonaController constructor.
     * @param $personaManager
     */
    public function __construct(PersonaManager $personaManager)
    {
        $this->personaManager = $personaManager;
    }

    /**
     * @Rest\Get("/list", name="list", methods={"GET"})
     * @Route("/{vueRouting}", requirements={"vueRouting"="^(?!persona|_(profiler|wdt)).*"}, name="list")
     * @param Request $request
     * @return JsonResponse
     */
    public function listAction(Request $request): JsonResponse
    {
        $result = $this->personaManager->findAll();

        return new JsonResponse($result);
    }

    /**
     * @Rest\Post("/new", name="new")
     *
     * @param Request $request
     * @return JsonResponse
     * @throws \Exception
     */
    public function newAction(Request $request): JsonResponse
    {
        $fecha = new \DateTime($request->request->get('fechaNac'));
        $persona = (new Persona())
            ->setNombres($request->request->get('nombres'))
            ->setApellidos($request->request->get('apellidos'))
            ->setCantHijos($request->request->get('cantHijos'))
            ->setCargo($request->request->get('cargo'))
            ->setEdad($request->request->get('edad'))
            ->setNoId($request->request->get('noId'))
            ->setFechaNac($fecha)
            ->setRaza($request->request->get('raza'))
            ->setSexo($request->request->get('sexo'))
            ->setSalario($request->request->get('salario'));

        return new JsonResponse($this->personaManager->newPerson($persona));
    }

    /**
     * @Rest\Get("/getperson/{id}", name="getPerson", methods={"GET","POST"})
     * @param Request $request
     * @return JsonResponse
     */
    public function getPersonAction(Request $request, Persona $persona): JsonResponse
    {
        $result = $this->personaManager->findById($persona->getId());

        return new JsonResponse($result);
    }


    /**
     * @Rest\Post("/edit/{id}", name="edit/{id}", methods={"GET","POST"})
     * @param Request $request
     * @return Response
     * @throws \Exception
     */
    public function editAction(Request $request, Persona $persona): Response
    {
        $fecha = new \DateTime($request->get('fechaNac')['date']);
        $persona
            ->setNombres($request->request->get('nombres'))
            ->setApellidos($request->request->get('apellidos'))
            ->setCantHijos($request->request->get('cantHijos'))
            ->setCargo($request->request->get('cargo'))
            ->setEdad($request->request->get('edad'))
            ->setNoId($request->request->get('noId'))
            ->setFechaNac($fecha)
            ->setRaza($request->request->get('raza'))
            ->setSexo($request->request->get('sexo'))
            ->setSalario($request->request->get('salario'));
        return new JsonResponse($this->personaManager->editPerson($persona));
    }


    /**
     * @Rest\Delete("/delPerson/{id}", name="persona_delete", methods={"DELETE"})
     * @param Request $request
     * @param Persona $persona
     * @return Response
     */
    public function delPersonAction(Request $request, Persona $persona): Response
    {
        $result = $this->personaManager->delPerson($persona);

        return new JsonResponse($result);
    }
}
