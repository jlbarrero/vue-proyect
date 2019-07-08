<?php


namespace App\Services;


use App\Entity\Persona;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\ORM\EntityRepository;
use phpDocumentor\Reflection\Types\Integer;
use phpDocumentor\Reflection\Types\This;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class PersonaManager
 * @package App\Services
 */
class PersonaManager
{
    /**
     * @var \App\Repository\PersonaRepository|\Doctrine\Common\Persistence\ObjectRepository
     */
    private $respository;
    /**
     * @var ObjectManager
     */
    private $om;

    /**
     * PersonaManager constructor.
     * @param $respository
     */
    public function __construct(ObjectManager $om)
    {
        $this->respository = $om->getRepository(Persona::class);
        $this->om = $om;
    }

    /**
     * @return array
     */
    public function findAll(): array
    {
        $personas = $this->respository->findAll();
        $resul = [];
        foreach ($personas as $k => $persona) {
            $resul[$k] = $persona->toArry();
        }
        return $resul;
    }

    /**
     * @param Persona $persona
     * @return bool
     */
    public function newPerson(Persona $persona): bool
    {
        $this->om->persist($persona);
        $this->om->flush();
        return true;
    }

    /**
     * @param Persona $persona
     * @return bool
     */
    public function editPerson(Persona $persona): bool
    {
        $this->om->persist($persona);
        $this->om->flush();
        return true;
    }

    /**
     * @param int $id
     * @return array
     */
    public function findById(int $id): array
    {
        return $this->respository->find($id)->toArry();
    }

    /**
     * @param Persona $persona
     * @return bool
     */
    public function delPerson(Persona $persona): bool
    {
        $this->om->remove($persona);
        $this->om->flush();
        return true;
    }
}