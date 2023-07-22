import hello from './modules/hello';

const bootstrap = async () => {
  hello();
};

function filterPosts() {
  const yearCheckboxes = document.querySelectorAll('input[name="year"]');
  const monthCheckboxes = document.querySelectorAll('input[name="month"]');
  const locationSelect = document.querySelector('select[name="location"]');

  const year = Array.from(yearCheckboxes)
    .filter((checkbox) => checkbox.checked)
    .map((checkbox) => checkbox.value)
    .join(',');
  const month = Array.from(monthCheckboxes)
    .filter((checkbox) => checkbox.checked)
    .map((checkbox) => checkbox.value)
    .join(',');

  const location = locationSelect.value;

  const data = new FormData();
  data.append('action', 'filter_posts');
  data.append('year', year);
  data.append('month', month);
  data.append('location', location);

  fetch(ajax_object.ajax_url, {
    method: 'POST',
    body: data,
  })
    .then((response) => response.json())
    .then((result) => {
      const eventsPosts = document.querySelector('.events-posts');
      if (result.length) {
        eventsPosts.innerHTML = result.join('');
      } else {
        const empty =
          '<div class="events-empty">Nothing with this filter</div>';
        eventsPosts.innerHTML = empty;
      }
    })
    .catch((error) => console.error('Error:', error));
}

document
  .querySelectorAll('input[name="year"]')
  .forEach((checkbox) => checkbox.addEventListener('change', filterPosts));
document
  .querySelectorAll('input[name="month"]')
  .forEach((checkbox) => checkbox.addEventListener('change', filterPosts));
document
  .querySelector('select[name="location"]')
  .addEventListener('change', filterPosts);

bootstrap();
