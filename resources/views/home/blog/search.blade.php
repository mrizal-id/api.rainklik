<i class="ai-search position-absolute top-50 start-0 translate-middle-y ms-3"></i>
<input class="form-control ps-5" type="search" id="search" placeholder="Enter keyword">
<div id="search-results" class="dropdown-menu w-100 shadow" style="max-height: 300px; overflow-y: auto;"></div>

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
                            searchResults.innerHTML = data.map(post => {
                                let formattedDate = new Date(post.created_at)
                                    .toLocaleDateString(undefined, {
                                        year: 'numeric',
                                        month: 'long',
                                        day: 'numeric'
                                    });

                                return `
                <a href="/blog/${post.slug}" class="dropdown-item d-flex align-items-center" style="white-space: normal;">
                    <img src="${post.cover ? `{{ asset('assets/') }}/${post.cover}` : `{{ asset('/images/no-image.jpg') }}`}"
                        alt="${post.title}" class="rounded me-3" width="50" height="50">
                    <div style="overflow: hidden; text-overflow: ellipsis; max-width: 250px;">
                        <strong style="display: block; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">${post.title}</strong><br>
                        <small class="text-muted">${formattedDate}</small>
                    </div>
                </a>
            `;
                            }).join("");
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
