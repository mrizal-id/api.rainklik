<i class="ai-search position-absolute top-50 start-0 translate-middle-y ms-3"></i>
<input class="form-control ps-5" type="search" id="search" placeholder="Enter keyword">
<div id="search-results" class="dropdown-menu w-100 shadow"></div>
@push('scripts')
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            let searchInput = document.getElementById("search");
            let searchResults = document.getElementById("search-results");

            searchInput.addEventListener("keyup", function() {
                let query = this.value.trim();

                if (query.length < 2) {
                    searchResults.classList.remove("show");
                    return;
                }

                fetch("{{ url('/blog') }}?query=" + encodeURIComponent(query), {
                        headers: {
                            "X-Requested-With": "XMLHttpRequest"
                        }
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.length === 0) {
                            searchResults.innerHTML =
                                `<a href="#" class="dropdown-item disabled">No results found</a>`;
                        } else {
                            searchResults.innerHTML = data.map(post => `
                <a href="/blog/${post.slug}" class="dropdown-item d-flex align-items-center">
                    <img src="${post.cover ? `{{ asset('assets/') }}/${post.cover}` : `{{ asset('assets/default-cover.jpg') }}`}"
                        alt="${post.title}" class="rounded me-3" width="50" height="50">
                    <div>
                        <strong>${post.title}</strong><br>
                        <small class="text-muted">${post.created_at}</small>
                    </div>
                </a>
            `).join("");
                        }
                        searchResults.classList.add("show");
                    })
                    .catch(error => console.error("Error:", error));
            });

            document.addEventListener("click", function(event) {
                if (!searchInput.contains(event.target) && !searchResults.contains(event.target)) {
                    searchResults.classList.remove("show");
                }
            });
        });
    </script>
@endpush
