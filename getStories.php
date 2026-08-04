<?php
header('Content-Type: application/json; charset=utf-8');

$stories = [
    [
        'title' => 'A fun toddler coloring training on classroom',
        'description' => 'Beautiful branding for changes by Never Now in Australia. changes is a platform for open discussion in an inclusive and collaborative environment, providing the.',
        'date' => 'November 19, 2026',
        'image' => 'assets/story-1.png'
    ],
    [
        'title' => 'Find out if a school fits the family’s needs',
        'description' => 'A clear process to choose a school that matches child personality, values, and educational goals.',
        'date' => 'November 19, 2026',
        'image' => 'assets/story-2.png'
    ],
    [
        'title' => 'Summer math & literacy centres for kids',
        'description' => 'Summer learning centers help children build maths and reading confidence while enjoying interactive activities.',
        'date' => 'November 19, 2026',
        'image' => 'assets/story-3.png'
    ],
    [
        'title' => 'Classroom management techniques for new tutors',
        'description' => 'Discover best practices for tutors who want calmer, more productive classroom sessions.',
        'date' => 'September 10, 2026',
        'image' => 'assets/story-4.png'
    ],
    [
        'title' => 'Conversation rhymes improve kids listening',
        'description' => 'Rhymes and stories support language skills and attention in early learners.',
        'date' => 'July 19, 2026',
        'image' => 'assets/story-5.png'
    ],
];

echo json_encode(['stories' => $stories]);
