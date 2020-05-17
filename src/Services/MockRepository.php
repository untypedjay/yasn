<?php
namespace Services;

class MockRepository implements \Model\Interfaces\Repository {
  private $mockUsers;
  private $mockPosts;
  private $mockComments;

  public function __construct() {
    // create mock data
    $this->mockUsers = array(
      array('1', 'jeff', 'jeff123'),
      array('2', 'lisa', 'lisa123')
    );

    $this->mockPosts = array(
      array('1',
            'Tips and tricks for new people',
            'Lasfuegos1',
            '4:14pm May 13 2020',
            'TIL Benjamin Franklin attempted to predict the death of his competitor, Titan Leeds. When Leeds was still alive he posted an
            obituary anyways. When Leeds challenged it, Franklin insisted he was an imposter. When Leeds died in 1738 Franklin publicly commended
            the impostors for ending their charade'),
      array('2',
            'My account got hacked. Why? and Who?',
            'Josefa972837',
            '7:54pm January 13 2020',
            'My wife doesn’t want our newborn son’s face posted on social media, so she asked me to censor over it. Needless to say, I won’t be
            asked to do that again.'),
      array('3',
            'How should I organize my learning?',
            'SpicyNutMeg',
            '3:12pm December 30 2019',
            'Of all my mother-in-laws landscapes... i thought this one need some thing subtle added. Something classy, something moving...
            something... like a pack of veloceraptors.'),
      array('4',
            'Do You Know...',
            'averaver',
            '11:11am April 04 2020',
            'If the prefix "pluto" means wealth, and the suffix "theist" means belief or worship of a deity, what do you call someone
            who worships money above all else? American'),
      array('5',
            'Advice on overcoming speaking anxiety?',
            'NymphedoraTonk',
            '1:12am April 13 2020',
            'Jeff Bezos (CEO of Amazon) is refusing a request for testimony from congress while they threaten subpoena.'),
      array('6',
            'Where are chatbots?',
            'Zhadial',
            '10:23am May 01 2020',
            'TIL that an outlaw isnt any mere criminal, but rather a criminal who has been sentenced to be outside of the
            protection of the law. He has no right to trial, and can be killed or persecuted by anybody.'),
      array('7',
            'DaphneTheSnail',
            'HeyMarlana',
            '12:40pm March 16 2020',
            '41% of Americans say they wont buy products made in China, while 35% of Chinese say they wont buy American-made goods'),
      array('8',
            'How to make a good post',
            'GraceBoyd9',
            '11:32pm June 05 2019',
            '2009 footage of an Emo/Scene Girl introducing her cast of colorful mallrat friends at a parking lot. Hijinks, shit talk,
            emo hair, snakebite piercings, MySpace shout outs and flip phones ensue. A very good and surprisingly wholesome snapshot of the era.'),
      array('9',
            'My two year old loves YASN!',
            'RACHELSIGL8',
            '11:20am May 12 2020',
            'I wouldnt stress about it too much, its generally because people who dont understand the difference between ionising and non ionising radiation have limited education. Theyve got a lot of time on their hands, to be trawling through YouTube videos trying to discredit as many people as they can')
    );

    $this->mockComments = array(
      array('1', '1', 'Not as much as their double barrel shotguns', 'thegreyhairdraice', '9:34am April 3 2020'),
      array('2', '1', 'Everyone Ive met climbing is so genuinely cool! Such a fun sport.', 'ILikePieBro', '1:45pm June 12 2019'),
      array('3', '1', 'I unfortunately only got into rock climbing after lockdown started where I am :( (magnus midtbø)', 'smalltinyduck', '9:23pm February 29 2020'),
      array('4', '2', 'Everyone new to indoor, or outdoor, climbing, heed the above advice.', 'pearlysdad', '9:54am April 22 2020'),
      array('5', '3', 'Theyre different but both are good for workouts. You can climb for an hour at the gym easy without noticing and leave with your forearms on fire. Its great for getting a ton of time in and honing technique. Artificial is where Id start because youre in a controlled environment and dont need as much equipment. My pass is incredibly cheap ($20/6 mo) and my salary isnt great, so I am slowly building up my outdoor kit.', 'Luthais874', '4:03pm July 23 2019'),
      array('6', '3', 'This is my answer as well. Tbh the same friend has introduced me to many things.', 'CakesForLife', '12:33am May 11 2019'),
      array('7', '4', 'I feel like everything I like was introduced. Im shit at discovering things on my own. But Ill say sushi.', 'diaduitrii', '8:00am August 20 2019'),
      array('8', '4', 'Same here. Life isnt the same without fresh sushi', 'iamtherealhusk', '5:23pm May 27 2019'),
      array('9', '4', 'Thats beautiful. The best gift anyone can get is new friends. Or maybe second best. A flamethrower would be pretty damn hard to beat', 'ClarinetistBreakfast', '7:56am December 9 2019'),
      array('10', '5', 'Yeah? What about TWO flamethrowers?', 'DamagedJefff', '9:34am April 15 2020'),
      array('11', '6', 'That really is the most important. Your response was a very eloquent, much better stated version of what I was trying to convey. :-) Well said.', 'Back2Bach', '9:25pm September 19 2019'),
      array('12', '7', 'D&D. I would have never played otherwise and its so much fun!', 'extra_gloves', '3:36pm September 1 2019'),
      array('13', '7', 'Same! It is such a fun game, but the nerdy optics always scared me away (ridiculous for someone who is already as nerdy as I am).', 'MrNito', '2:16pm November 4 2019'),
      array('14', '7', 'This!!! I love this. Ive been stuck with a lot of noodles bc od the current situation and i absolutely love cooking thrm like this, often add fresh or frozen veggies. Maybe some chia seeds as a final topping at the end once its served.', 'Kyspizs', '6:49am April 3 2020'),
      array('15', '7', 'Poaching eggs in the starchy salty pasta water is SO good.', 'dustyshade', '8:28pm January 5 2020'),
      array('16', '7', 'Minecraft. I was mid twenties and they spent years trying to get me to play but I thought it was a kids game. I finally played one day and loved it so much that I spent the next four years way more into it than they ever were.', '_wheresyourfork', '9:58am March 14 2020'),
      array('17', '8', 'Great series, Ive been on book 4.5 for too long though, got distracted by that lame thing called college. Hope to start it up again and finish it soon now that Ive graduated.', 'OddEye', '11:01pm May 10 2019')
    );
  }

  public function getUserForUserNameAndPassword(string $userName, string $password): ?\Model\Entities\User {
    foreach ($this->mockUsers as $u) {
      if ($u[1] == $userName && $u[2] == $password) {
        return new \Model\Entities\User($u[0], $u[1]);
      }
    }
    return null;
  }

  public function getUser(string $id): ?\Model\Entities\User {
    foreach ($this->mockUsers as $u) {
      if ($u[0] == $id) {
        return new \Model\Entities\User($u[0], $u[1]);
      }
    }
    return null;
  }

  public function getPosts(): array {
    $posts = array();
    foreach ($this->mockPosts as $p) {
      $posts[] = new \Model\Entities\Post($p[0], $p[1], $p[2], $p[3], $p[4]);
    }
    return $posts;
  }

  public function getPostFromId(string $postId): ?\Model\Entities\Post {
    foreach ($this->mockPosts as $p) {
      if ($p[0] == $postId) {
        return new \Model\Entities\Post($p[0], $p[1], $p[2], $p[3], $p[4]);
      }
    }
    return null;
  }

  public function getCommentsFromPost(string $postId): array {
    $comments = array();
    foreach ($this->mockComments as $c) {
      if ($c[1] == $postId) {
        $comments[] = new \Model\Entities\Comment($c[0], $c[1], $c[2], $c[3], $c[4]);
      }
    }
    return $comments;
  }

  public function addComment(\Model\Entities\Comment $comment): void {
    array_push($this->mockComments, $comment->getCommentId(), $comment->getPostId(), $comment->getContent(), $comment->getAuthor(), $comment->getTime());
  }

  public function createCommentId(): string {
    return sizeof($this->mockComments) + 1;
  }
}