import AppListing from '../app-components/Listing/AppListing';

Vue.component('post-listing', {
    mixins: [AppListing],

    data() {
        return {
            showCompanyFilter: false,
            companyMultiselect: {},
    
            filters: {
                company: [],
            },
        }
    },
    
    watch: {
        showCompanyFilter: function (newVal, oldVal) {
            this.companyMultiselect = [];
        },
        companyMultiselect: function(newVal, oldVal) {
            this.filters.company = newVal.map(function(object) { return object['key']; });
            this.filter('company', this.filters.company);
        }
    }
});