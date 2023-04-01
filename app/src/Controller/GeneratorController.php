<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use OpenApi\Annotations as OA;
use App\Services\Generators\GeneratorFactory;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class GeneratorController extends AbstractController
{

    /**
    * @OA\Tag(name="generator")
    * @OA\RequestBody(
    *     required=true,
    *     description="Params for generator",
    *     @OA\JsonContent(
    *     @OA\Property(property="params", type="object"),
    *     )
    * )
    */
    public function generate($provider, Request $request, GeneratorFactory $factory): Response
    {
        $generator = $factory->createGenerator($provider);
        $content = json_decode($request->getContent(), true);
        $result = $generator->generate($content['params']);
        
        return new JsonResponse($result);
    }

    public function test()
    {
        $test = json_decode('{
                "photo": "https://cdn.pixabay.com/photo/2023/03/25/17/35/girl-7876505_960_720.jpg",
                "name": "Kamil",
                "surname": "Jakubowicz",
                "email": "kjakubowicz@o2.pl",
                "phone": "734874569",
                "birthdate": "12-12-2140",
                "description": "Opis do cv",
                "experience": [
                    {
                        "name": "testowa",
                        "start": "2-12-2003",
                        "end": "2-12-2005",
                        "stanowisko": "PHP"
                    },
                    {
                        "name": "testowa",
                        "start": "2-12-2003",
                        "end": "2-12-2005",
                        "stanowisko": "PHP"
                    }
                ],
                "education": [
                    {
                        "name": "testowa",
                        "start": "2-12-2003",
                        "end": "2-12-2005",
                        "school": "MZSP"
                    },
                    {
                        "name": "testowaas",
                        "start": "2-10-2006",
                        "end": "2-12-2007",
                        "school": "TEst"
                    }
                ],
                "languageSkills": [
                    {
                        "name": "english",
                        "lvl": "b1"
                    },
                    {
                        "name": "polish",
                        "lvl": "b2"
                    }
                ],
                "skills": [
                    {
                        "name": "szybki rozwój"
                    },
                    {
                        "name": "praca w grupie"
                    }
                ],
                "interests": [
                    {
                        "name": "sprzatanie"
                    },
                    {
                        "name": "malowanie"
                    }
                ],
                "links": [
                    {
                        "name": "git",
                        "start": "https://github.com/nelmio/NelmioApiDocBundle/issues/1759"
                    },
                    {
                        "name": "yb",
                        "start": "https://www.youtube.com/@bartkubicki2554/videos"
                    }
                ]
        }', true
    );

        return $this->render(
            'pdf/cv.html.twig',[
                'data' => $test
            ]
        );
    }
}
