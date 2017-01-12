<?php

namespace SistemaBundle\Controller;

use SistemaBundle\Entity\Subcategorias;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Subcategoria controller.
 *
 * @Route("subcategorias")
 */
class SubcategoriasController extends Controller
{
    /**
     * Lists all subcategoria entities.
     *
     * @Route("/", name="subcategorias_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $subcategorias = $em->getRepository('SistemaBundle:Subcategorias')->findAll();

        return $this->render('SistemaBundle:Subcategorias:index.html.twig', array(
            'subcategorias' => $subcategorias,
        ));
    }

    /**
     * Creates a new subcategoria entity.
     *
     * @Route("/new", name="subcategorias_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $subcategoria = new Subcategorias();
        $form = $this->createForm('SistemaBundle\Form\SubcategoriasType', $subcategoria);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($subcategoria);
            $em->flush($subcategoria);

            return $this->redirectToRoute('subcategorias_show', array('id' => $subcategoria->getId()));
        }

        return $this->render('SistemaBundle:Subcategorias:new.html.twig', array(
            'subcategoria' => $subcategoria,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a subcategoria entity.
     *
     * @Route("/{id}", name="subcategorias_show")
     * @Method("GET")
     */
    public function showAction(Subcategorias $subcategoria)
    {
        $deleteForm = $this->createDeleteForm($subcategoria);

        return $this->render('SistemaBundle:Subcategorias:show.html.twig', array(
            'subcategoria' => $subcategoria,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing subcategoria entity.
     *
     * @Route("/{id}/edit", name="subcategorias_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Subcategorias $subcategoria)
    {
        $deleteForm = $this->createDeleteForm($subcategoria);
        $editForm = $this->createForm('SistemaBundle\Form\SubcategoriasType', $subcategoria);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('subcategorias_edit', array('id' => $subcategoria->getId()));
        }

        return $this->render('SistemaBundle:Subcategorias:edit.html.twig', array(
            'subcategoria' => $subcategoria,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a subcategoria entity.
     *
     * @Route("/{id}", name="subcategorias_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Subcategorias $subcategoria)
    {
        $form = $this->createDeleteForm($subcategoria);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($subcategoria);
            $em->flush($subcategoria);
        }

        return $this->redirectToRoute('subcategorias_index');
    }

    /**
     * Creates a form to delete a subcategoria entity.
     *
     * @param Subcategorias $subcategoria The subcategoria entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Subcategorias $subcategoria)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('subcategorias_delete', array('id' => $subcategoria->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
