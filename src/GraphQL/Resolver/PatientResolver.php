<?php

/**
 * Description of PatientResolver
 *
 * @author miguelgilmartinez@gmail.com
 */

namespace App\GraphQL\Resolver;

use App\Entity\Patient;
use Doctrine\ORM\EntityManagerInterface;
use Overblog\GraphQLBundle\Definition\Argument;
use Overblog\GraphQLBundle\Definition\Resolver\AliasedInterface;
use Overblog\GraphQLBundle\Definition\Resolver\ResolverInterface;

class PatientResolver implements ResolverInterface, AliasedInterface {

    public function __construct(EntityManagerInterface $em) {
        $this->em = $em;
    }

    public function findAllPatients(Argument $args) {
        $values= $this->em->getRepository(Patient::class)->findAll();
//        foreach ($values as $id => $data) {
//            die ($data);
//        }
        //tEST2
        return $values;
    }

    public static function getAliases(): array {
        return [
          
            'findAllPatients' => 'all_patients'
        ];
    }

}
