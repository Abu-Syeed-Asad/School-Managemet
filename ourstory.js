const storyContainer = document.getElementById('storyContainer');

const renderStories = (stories) => {
  if (!storyContainer) return;
  storyContainer.innerHTML = stories.map(story => `
    <div class="story" style="margin-bottom:16px;">
      <div class="st1" style="display:flex;gap:12px;align-items:flex-start;">
        <img src="${story.image}" class="si" alt="${story.title}" style="width:120px;object-fit:cover;border-radius:10px;">
        <div>
          <button class="b" style="margin-bottom:8px">${story.date}</button>
          <h4>${story.title}</h4>
          <p>${story.description}</p>
        </div>
      </div>
    </div>
  `).join('');
};

const loadStories = async () => {
  if (!storyContainer) return;
  try {
    const response = await fetch('getStories.php');
    if (!response.ok) {
      storyContainer.innerHTML = '<p>Unable to load stories at this time.</p>';
      return;
    }
    const data = await response.json();
    renderStories(data.stories || []);
  } catch (error) {
    console.error(error);
    storyContainer.innerHTML = '<p>Unable to load stories at this time.</p>';
  }
};

loadStories();
