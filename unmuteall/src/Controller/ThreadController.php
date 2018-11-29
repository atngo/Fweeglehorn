<?php
	namespace App\Controller;

	use App\Entity\Thread;

	use Symfony\Component\HttpFoundation\Response;
	use Symfony\Component\HttpFoundation\Request;
	use Symfony\Component\Routing\Annotation\Route;
	use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
	use Symfony\Bundle\FrameworkBundle\Controller\Controller;

	use Symfony\Component\Form\Extension\Core\Type\TextType;
	use Symfony\Component\Form\Extension\Core\Type\TextareaType;
	use Symfony\Component\Form\Extension\Core\Type\SubmitType;
	use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

	class ThreadController extends Controller {
		/**
		*@Route("/", name="thread_list")
		*Method({"GET"})
		*/
		public function index(){
		$threads= $this->getDoctrine()->getRepository(Thread::class)->findAll();

		return $this->render('threads/index.html.twig', array('threads' => $threads));
		}


	 /**
	  * @Route("/thread/new", name="new_thread")
	  * Method({"GET","POST"})
	  */
	  public function new(request $request){
	  	  $thread = new Thread();
		  $form = $this->createFormBuilder($thread)
			->add('title', TextType::class, array('attr' => 
			array('class' => 'form-title')))
			->add('body',TextareaType::class, array('attr' => 
			array('class' => 'form-body')))

			->add('category', ChoiceType::class, array(
			'choices'  => array(
			  'League of Legends' => 'League of Legends',
			'Overwatch' => 'Overwatch',
		 'Fortnite' => 'Fortnite',
		 'Pokemon-GO' => 'Pokemon-GO',
		 'Minecraft' => 'Minecraft',
		 'Sims' => 'Sims',
    )
    
))
			->add('save', SubmitType::class,  array('label' => 'Create',
			'attr' => array('class' => 'button')
			))
			->getForm();

			$form->handleRequest($request);
			
			 if($form->isSubmitted() && $form->isValid()){
			 	 $article =$form->getData();

				 $entityManager = $this->getDoctrine()->getManager();
				 $entityManager ->persist($article);
				 $entityManager->flush();

				 return $this->redirectToRoute('thread_list');
			 }
			return $this->render('threads/new.html.twig', array('form' => $form->createView()));
	  }

	 /**
	 * @Route("/catagory-LOL", name="lol_catagory")
	 * Method({"GET","POST"})
	 */
	 public function CatagoryLOL(request $request){
	$threads= $this->getDoctrine()->getRepository(Thread::class)->findAll();

	return $this->render('threads/catagory-LOL.html.twig', array('threads' => $threads));
	}
	 /**
	 * @Route("/catagory-OW", name="ow_catagory")
	 * Method({"GET","POST"})
	 */
	 public function CatagoryOW(request $request){
	$threads= $this->getDoctrine()->getRepository(Thread::class)->findAll();

	return $this->render('threads/catagory-OW.html.twig', array('threads' => $threads));
	}
	 /**
	 * @Route("/catagory-Fortnite", name="fn_catagory")
	 * Method({"GET","POST"})
	 */
	 public function CatagoryFortnite(request $request){
	$threads= $this->getDoctrine()->getRepository(Thread::class)->findAll();

	return $this->render('threads/catagory-Fortnite.html.twig', array('threads' => $threads));
	}
	 /**
	 * @Route("/catagory-Pokemon-Go", name="pkg_catagory")
	 * Method({"GET","POST"})
	 */
	 public function CatagoryPKG(request $request){
	$threads= $this->getDoctrine()->getRepository(Thread::class)->findAll();

	return $this->render('threads/catagory-Pokemon-Go.html.twig', array('threads' => $threads));
	}
	 /**
	 * @Route("/catagory-Minecraft", name="mc_catagory")
	 * Method({"GET","POST"})
	 */
	 public function CatagoryMC(request $request){
	$threads= $this->getDoctrine()->getRepository(Thread::class)->findAll();

	return $this->render('threads/catagory-Minecraft.html.twig', array('threads' => $threads));
	}

	 /**
	 * @Route("/catagory-Sims", name="sims_catagory")
	 * Method({"GET","POST"})
	 */
	 public function CatagorySims(request $request){
	$threads= $this->getDoctrine()->getRepository(Thread::class)->findAll();

	return $this->render('threads/catagory-Sims.html.twig', array('threads' => $threads));
	}

	/**
	 * @Route("/thread/save")
	 */
	 public function save() {
	 	 $entityManager = $this->getDoctrine()->getManager();

		 $thread = new Thread();
		 $thread->setTitle('thread twp');
		 $thread->setBody('This is the body for thread twp');

		 $entityManager->persist($thread);

		 $entityManager->flush();

		 return new Response('Saves a thread with the id of '.$thread->getId());
	 }

	 /**
	 * @Route("/thread/{id}", name="thread_show" )
	 */
	public function show($id){
	$thread= $this->getDoctrine()->getRepository(Thread::class)->find($id);
	return $this->render('threads/show.html.twig', array('thread' => $thread));
	 }

	 }