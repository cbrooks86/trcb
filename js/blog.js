async function fetchPosts() {
    const res = await fetch('/blog/posts.json');
    return res.json();
  }
  
  function getQueryParam(key) {
    return new URLSearchParams(window.location.search).get(key);
  }
  
  async function loadBlogList() {
    const posts = await fetchPosts();
    const container = document.getElementById('blog-list');
    posts.forEach(post => {
      const card = document.createElement('div');
      card.className = 'blog-card';
      card.innerHTML = `
        <img src="${post.thumbnail}" alt="${post.title} thumbnail" class="blog-card__image">
        <div class="blog-card__content">
          <h2 class="blog-card__title">
            <a href="posts.html?slug=${post.slug}">${post.title}</a>
          </h2>
          <p class="blog-card__description">${post.description}</p>
          <a class="blog-card__link" href="posts.html?slug=${post.slug}">Read More →</a>
        </div>
      `;
      container.appendChild(card);
    });
  }  
  
  
  async function loadBlogPost() {
    const slug = getQueryParam('slug');
    const posts = await fetchPosts();
    const post = posts.find(p => p.slug === slug);
  
    if (!post) {
      document.getElementById('post-title').textContent = "Post Not Found";
      document.getElementById('post-content').innerHTML = "<p>Sorry, this post doesn't exist.</p>";
      return;
    }
  
    // Inject SEO/meta content
    document.title = post.title;
    document.getElementById('meta-description').setAttribute('content', post.description);
    document.getElementById('og-title').setAttribute('content', post.title);
    document.getElementById('og-description').setAttribute('content', post.description);
    document.getElementById('og-image').setAttribute('content', post.thumbnail);
  
    // Inject blog content
    document.getElementById('post-title').textContent = post.title;
    document.getElementById('post-content').innerHTML = post.content;
  }
  