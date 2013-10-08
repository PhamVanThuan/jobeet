<?php
namespace Ens\JobeetBundle\Datafixtures\ORM;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Ens\JobeetBundle\Entity\Category;
class LoadCategoryData extends AbstractFixture implements OrderedFixtureInterface
{
    public function getOrder() {
        return 1;
    }

    public function load(ObjectManager $em) {
        $design = new Category();
        $design->setName('design');
        
        $programming = new Category();
        $programming->setName('Programming');

        $manager = new Category();
        $manager->setName('Manager');

        $administrator = new Category();
        $administrator->setName('Administrator');
        
        $em->persist($design);
        $em->persist($programming);
        $em->persist($administrator);
        $em->persist($manager);
        
        $em->flush();
        
        $this->addReference('category-design', $design);
        $this->addReference('category-programming', $programming);
        $this->addReference('category-manager', $manager);
        $this->addReference('category-administrator', $administrator);
        
        
    }   
}
?>
