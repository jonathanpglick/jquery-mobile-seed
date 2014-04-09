<?php

function mockShow() {
  return array(

    // Name of the show
    'name' => 'The Lard Butt Indicator',

    // Date the show originally aired, in yyyy-mm-dd format
    'airdate' => '2013-06-15',

    // Description or excerpt of the show
    'description' => 'This week on Car Talk, why does the horn in John’s wife’s Golf start blowing when he drives it? John’s wife thinks he’s setting off the "lard butt indicator" under the driver’s seat.',

    // Total air time of the show, in hh:ss format
    'duration' => '59:35',

    // Total air time of the best moment, in hh:ss format
    'duration_bestmoment' => '1:23',

    // URL for this show's corresponding puzzler (or an ID, etc., suitable for assembling a URL)
    'puzzler_url' => '/the-puzzler/previous',

    // URL for this show's corresponding purchase link on iTunes
    'itunes_url' => 'https://itunes.apple.com/us/artist/car-talk/id381127032',
  );
}

function mockPuzzler() {
  return array(

    // Name of the puzzler
    'name' => 'The Lard Butt Indicator',

    // Date the puzzler originally aired, in yyyy-mm-dd format
    'airdate' => '2013-06-15',

    // Text of the puzzler
    'description' => 'This week on Car Talk, why does the horn in John’s wife’s Golf start blowing when he drives it?',

    // Text of the puzzler's answer
    'answer' => 'The first step must be to bring the goose across the river, as any other will result in the goose or the beans being eaten. When the farmer returns to the original side, he has the choice of bringing either the fox or the beans across. If he brings the fox across, he must then return to bring the beans over, resulting in the fox eating the goose. If he brings the beans across, he will need to return to get the fox, resulting in the beans being eaten. Here he has a dilemma, solved by bringing the fox (or the beans) over and bringing the goose back. Now he can bring the beans (or the fox) over, leaving the goose, and finally return to fetch the goose.',

    // Duration of the question portion of the puzzler, in hh:ss format
    'duration_question' => '2:33',

    // Duration of the answer portion of the puzzler, in hh:ss format
    'duration_answer' => '4:16',
  );
}

function mockPost($contributor = 'tomandray', $promoted = false) {

  $titles = array(
    'I Dream of Timing Belts?',
    'Driven to Extremes: Man Meets Prius',
    'When to Replace Your Brakes? Our Top Ten',
    'Boneheaded Mistakes: Gas Tank Edition',
    'Caption Contest: Duck and Cover!',
    'Dangerous Stuff First, Expensive Stuff Second',
    'Click and Clack, Marriage Counselors',
    'Today: Help Dave Choose a New Car',
    'Paging Miss Manners: Parking Etiquette',
    'Today: Lightning vs. Town Car',
    'Today: Is Bill’s Dealer Charging Too Much?',
  );

  return array(

    // Title of the post
    'title' => $titles[array_rand($titles)],

    // Is this post promoted?
    'is_promoted' => $promoted,

    // Contributor of this post
    'contributor' => $contributor,

    // Date the blog post was published
    'published' => '2013-06-15',

    // Number of Disqus comments
    'comments_count' => 4,

    // Excerpt or summary of the blog post
    'excerpt' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut molestie turpis sed egestas commodo.',

    // Full text of the blog post
    'text' => '<p>Ut elit lectus, eleifend eget nunc et, scelerisque interdum purus. Vestibulum imperdiet tellus id posuere bibendum. Proin sollicitudin, libero laoreet ultrices gravida, arcu velit gravida nunc, ornare consectetur urna est sed ipsum. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Curabitur volutpat egestas malesuada. Ut facilisis et sapien a aliquam. In hac habitasse platea dictumst. Donec aliquet nisi sed quam tincidunt tincidunt. Nam pharetra arcu eu massa fringilla egestas. Vestibulum pulvinar tincidunt lacinia. Nam sapien sem, ultricies a dapibus quis, suscipit id mi. In nec mi non lacus euismod molestie. Fusce sit amet libero pretium, eleifend ipsum et, condimentum metus.</p><p>Vestibulum dapibus egestas mauris, a tempus magna. Nunc semper lacinia sapien a elementum. Aliquam erat volutpat. Etiam vestibulum dui congue risus tincidunt feugiat. Nullam id sapien ut justo dapibus sodales. Aliquam in dolor egestas lectus commodo sollicitudin. Praesent ultrices aliquet sapien.</p>Donec sit amet vulputate tellus. Curabitur egestas semper fringilla. Vestibulum dapibus condimentum urna non consequat. Suspendisse ut libero tellus. Vivamus molestie tellus nec nibh dignissim, in laoreet urna tempor. Etiam fermentum id turpis eget accumsan. Suspendisse augue elit, aliquam non diam a, ullamcorper pretium odio. Quisque lobortis nisl vitae rutrum luctus. In eu arcu tortor. Pellentesque tincidunt nisl urna, a imperdiet ipsum mattis quis. Duis sit amet augue scelerisque, eleifend est eu, dignissim nisl. Pellentesque rhoncus venenatis orci eu bibendum. Ut tempus risus quam, ac porttitor augue imperdiet vel.</p>',

    // Source of poster image
    'img_src_poster' => 'http://goo.gl/9ulT5',

    // Source of thumbnail image
    'img_src_thumb' => 'http://goo.gl/KOpSo',

  );
}

function mockContributors() {
  return array(
    'tomandray' => array('url' => '/blogs?contributor=tomandray', 'name' => 'Tom and Ray'),
    'jim' => array('url' => '/blogs?contributor=jim', 'name' => 'Jim Montavalli'),
    'tom' => array('url' => '/blogs?contributor=tom', 'name' => 'Tom Bodett'),
    'driver' => array('url' => '/blogs?contributor=driver', 'name' => 'Driver Distraction'),
    'jamie' => array('url' => '/blogs?contributor=jamie', 'name' => 'Jamie Kitman'),
    'guests' => array('url' => '/blogs?contributor=guests', 'name' => 'Guest Bloggers'),
    'staff' => array('url' => '/blogs?contributor=staff', 'name' => 'Staff'),
  );
}

function mockArticle() {

  $titles = array(
    'Cars.com Reviews the 2013 Audi RS 5',
    '2014 Toyota Corolla: Photo Gallery',
    'Which Cars Fit Three Car Seats?',
    'Best and Worst Resale Value',
    'Top 10 Cash Back Offers',
    'Quick Quiz: Should I Buy or Lease a Car?',
    'How Leasing a Car Has Changed',
    'Certified Pre-Owned Users Guide',
    'Quick Quiz: Should I Buy a Hybrid Car?',
    'Best and Worst Gas Mileage',
    'How to Use Customer and Dealer Incentives',
    'Negotiating with Car Dealers',
  );

  return array(

    // Title of the article
    'title' => $titles[array_rand($titles)],

    // Date the article was published
    'published' => '2013-06-15',

    // Excerpt or summary for the article
    'excerpt' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut molestie turpis sed egestas commodo. Vivamus porttitor lobortis dolor vel mollis. Donec vel augue auctor, imperdiet massa sit amet, pulvinar metus.',

    // External URL of the article
    'url' => 'http://cars.com',

  );
}

function mockDiscussion() {
  return array(

    // Title of the discussion
    'title' => 'Toyota Camry, front seatbelt is stuck...',

    // Date the discussion was published
    'published' => '2013-06-15',

    // Number of discussion comments
    'comments_count' => 10,

  );
}

function mockTopics() {
  return array(
    array('url' => 'http://cars.com', 'title' => 'Research cars'),
    array('url' => 'http://cars.com', 'title' => 'Buy a new car'),
    array('url' => 'http://cars.com', 'title' => 'Sell your car'),
    array('url' => 'http://cars.com', 'title' => 'Buy a used car'),
  );
}

function mockShows($count = 5) {
  $shows = array();
  while ($count-- > 0) {
    array_push($shows, mockShow());
  }
  return $shows;
}

function mockPuzzlers($count = 5) {
  $puzzlers = array();
  while ($count-- > 0) {
    array_push($puzzlers, mockPuzzler());
  }
  return $puzzlers;
}

function mockPosts($count = 5, $contributor = NULL) {

  if (strlen($contributor)) {
    $posts = array(mockPost($contributor, true));
    while ($count-- > 1) {
      array_push($posts, mockPost($contributor));
    }
  } else {
    $posts = array(
      mockPost('tomandray', true),
      mockPost('jim'),
      mockPost('tom'),
      mockPost('tom'),
      mockPost('tomandray'),
      mockPost('driver'),
      mockPost('staff'),
      mockPost('staff'),
      mockPost('guests'),
      mockPost('tomandray'),
    );
  }

  return $posts;
}

function mockArticles($count = 5) {
  $articles = array();
  while ($count-- > 0) {
    array_push($articles, mockArticle());
  }
  return $articles;
}

function mockDiscussions($count = 5) {
  $discussions = array();
  while ($count-- > 0) {
    array_push($discussions, mockDiscussion());
  }
  return $discussions;
}

function contributorName($token) {
  $contributors = mockContributors();
  if (isset($contributors[$token])) {
    return $contributors[$token]['name'];
  } else {
    'Unknown Contributor';
  }
}

?>
