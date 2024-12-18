class Dashboard {
    constructor() {
        this.initMap();
        this.initPortfolioChart();
        this.initActivityFeed();
        this.initSeriesList();
        this.bindEvents();
    }

    initMap() {
        const map = L.map('properties-map').setView([0, 0], 2);
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png').addTo(map);

        // Fetch and plot property locations
        this.fetchPropertyLocations().then(locations => {
            locations.forEach(location => {
                L.marker([location.lat, location.lng])
                    .bindPopup(location.name)
                    .addTo(map);
            });
        });
    }

    initPortfolioChart() {
        const ctx = document.getElementById('portfolio-chart').getContext('2d');
        new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: ['Real Estate', 'Pending', 'Available'],
                datasets: [{
                    data: [70, 20, 10],
                    backgroundColor: ['#4CAF50', '#FFC107', '#2196F3']
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false
            }
        });
    }

    initActivityFeed() {
        const feed = document.querySelector('.activity-feed');
        this.fetchActivityData().then(activities => {
            activities.forEach(activity => {
                feed.appendChild(this.createActivityItem(activity));
            });
        });
    }

    initSeriesList() {
        const list = document.querySelector('.series-list');
        this.fetchSeriesData().then(series => {
            series.forEach(item => {
                list.appendChild(this.createSeriesCard(item));
            });
        });
    }

    bindEvents() {
        document.querySelector('.create-series-btn').addEventListener('click', () => {
            this.handleCreateSeries();
        });

        document.querySelector('.view-investments-btn').addEventListener('click', () => {
            this.handleViewInvestments();
        });

        document.querySelector('.manage-profile-btn').addEventListener('click', () => {
            this.handleManageProfile();
        });
    }

    async fetchPropertyLocations() {
        const response = await fetch('/wp-json/real-estate/v1/properties');
        return await response.json();
    }

    async fetchActivityData() {
        const response = await fetch('/wp-json/real-estate/v1/activities');
        return await response.json();
    }

    async fetchSeriesData() {
        const response = await fetch('/wp-json/real-estate/v1/series');
        return await response.json();
    }

    createActivityItem(activity) {
        const item = document.createElement('div');
        item.className = 'activity-item';
        item.innerHTML = `
            <span class="activity-time">${activity.time}</span>
            <p class="activity-text">${activity.description}</p>
        `;
        return item;
    }

    createSeriesCard(series) {
        const card = document.createElement('div');
        card.className = 'series-item';
        card.innerHTML = `
            <img src="${series.image}" alt="${series.title}">
            <h4>${series.title}</h4>
            <p>${series.description}</p>
            <div class="series-meta">
                <span class="price">$${series.price}</span>
                <span class="ownership">${series.ownership}%</span>
            </div>
        `;
        return card;
    }

    handleCreateSeries() {
        window.location.href = '/create-series';
    }

    handleViewInvestments() {
        window.location.href = '/investments';
    }

    handleManageProfile() {
        window.location.href = '/profile-settings';
    }
}

document.addEventListener('DOMContentLoaded', () => {
    new Dashboard();
});
