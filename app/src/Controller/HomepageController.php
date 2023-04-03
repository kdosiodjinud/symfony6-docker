<?php declare(strict_types=1);

namespace App\Controller;

use App\Entity\Post;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bridge\Twig\Attribute\Template;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/post')]
class HomepageController extends AbstractController
{
    /**
     * @return string[]
     */
    #[Route('/create')]
    #[Template('post/create.html.twig')]
    public function create(EntityManagerInterface $entityManagerInterface): array
    {
        $post = new Post();
        $post->setTitle('Title at time ' . date('Y-m-d H:i:s'));
        $post->setContent('any content');

        $entityManagerInterface->persist($post);
        $entityManagerInterface->flush();

        return ['body' => 'Post saved!'];
    }

    /**
     * @return array<mixed>
     */
    #[Route('/read')]
    #[Template('post/read.html.twig')]
    public function read(EntityManagerInterface $entityManagerInterface): array
    {
        $posts = $entityManagerInterface->getRepository(Post::class)->findAll();

        return ['posts' => $posts];
    }
}
