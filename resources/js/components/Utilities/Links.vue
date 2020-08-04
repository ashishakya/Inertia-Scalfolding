<template>
  <div>
    <ul class="pagination justify-content-center">
      <li
        v-if="previousPageUrl"
        class="page-item"
      >
        <a
          href="#"
          class="page-link"
          @click.prevent="fetchPreviousPageData"
        >
          Prev
        </a>
      </li>
      <li
        v-for="eachUrlArray in urlsArray"
        :key="eachUrlArray.indexKey"
        class="page-item"
        :class="isActive(eachUrlArray.indexKey)"
      >
        <span v-if="eachUrlArray.type === 'URLS'">
          <InertiaLink
            href="#"
            class="page-link"
            :class="{ 'bg-blue-500 text-blue-700': eachUrlArray.isCurrentPage === true }"
            @click.prevent="fetchDataForPage(eachUrlArray.indexKey)"
          >
            {{ eachUrlArray.pageNumber }}
          </InertiaLink>
        </span>
        <span v-else-if="eachUrlArray.type === 'ELIPSIS'">
          {{ eachUrlArray.url }}
        </span>
      </li>
      <li
        v-if="nextPageUrl"
        class="page-item"
      >
        <InertiaLink
          href="#"
          class="page-link"
          @click.prevent="fetchNextPageData"
        >
          Next
        </InertiaLink>
      </li>
    </ul>
  </div>
</template>
2
<script>
export default {
    props: ["urlsArray", "previousPageUrl", "nextPageUrl"],
    methods: {
        isActive(currentPageNo) {
            const params = new URLSearchParams(window.location.search);
            if (parseInt(params.get("page")) === currentPageNo) { return "active"; }
        },
        fetchNextPageData() {
            const nextPageUrl = new URL(this.nextPageUrl)
            const queryParams = new URLSearchParams(nextPageUrl.search);
            const nextPageNo = queryParams.get("page");
            this.$emit("input", nextPageNo)
        },
        fetchPreviousPageData() {
            const previousPageUrl = new URL(this.previousPageUrl)
            const queryParams = new URLSearchParams(previousPageUrl.search);
            const previousPageNo = queryParams.get("page");
            this.$emit("input", previousPageNo)
        },
        fetchDataForPage(pageNo) {
            this.$emit("input", pageNo)
        }
    }
}
</script>
