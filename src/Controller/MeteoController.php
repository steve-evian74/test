<?php

namespace App\Controller;

use App\Entity\Meteo;
use App\Form\MeteoType;
use App\Repository\MeteoRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/meteo")
 */
class MeteoController extends Controller
{
    /**
     * @Route("/", name="meteo_index", methods="GET")
     */
    public function index(MeteoRepository $meteoRepository): Response
    {
        return $this->render('meteo/index.html.twig', ['meteos' => $meteoRepository->findAll()]);
    }

    /**
     * @Route("/new", name="meteo_new", methods="GET|POST")
     */
    public function new(Request $request): Response
    {
        $meteo = new Meteo();
        $form = $this->createForm(MeteoType::class, $meteo);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($meteo);
            $em->flush();

            return $this->redirectToRoute('meteo_index');
        }

        return $this->render('meteo/new.html.twig', [
            'meteo' => $meteo,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="meteo_show", methods="GET")
     */
    public function show(Meteo $meteo): Response
    {
        return $this->render('meteo/show.html.twig', ['meteo' => $meteo]);
    }

    /**
     * @Route("/{id}/edit", name="meteo_edit", methods="GET|POST")
     */
    public function edit(Request $request, Meteo $meteo): Response
    {
        $form = $this->createForm(MeteoType::class, $meteo);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('meteo_edit', ['id' => $meteo->getId()]);
        }

        return $this->render('meteo/edit.html.twig', [
            'meteo' => $meteo,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="meteo_delete", methods="DELETE")
     */
    public function delete(Request $request, Meteo $meteo): Response
    {
        if ($this->isCsrfTokenValid('delete'.$meteo->getId(), $request->request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($meteo);
            $em->flush();
        }

        return $this->redirectToRoute('meteo_index');
    }
}
