// Firebase Configuration for REMAS AL-FALAAH
// This file provides Firebase integration for both Laravel and static hosting

// Firebase config
const firebaseConfig = {
    apiKey: "AIzaSyCM2HyP8lrG0T1ld3zeKxFObgAfhCiNwa4",
    authDomain: "alfalaahremascom.firebaseapp.com",
    projectId: "alfalaahremascom",
    storageBucket: "alfalaahremascom.firebasestorage.app",
    messagingSenderId: "487077719451",
    appId: "1:487077719451:web:ca06311fc3bf978aa4453e",
    measurementId: "G-Y4MPCVH8E7"
};

// Initialize Firebase for static pages
if (typeof module !== 'undefined' && module.exports) {
    // Node.js environment
    module.exports = { firebaseConfig };
} else {
    // Browser environment
    window.REMAS_FIREBASE_CONFIG = firebaseConfig;
    
    // Auto-initialize if Firebase SDK is loaded
    if (typeof firebase !== 'undefined') {
        firebase.initializeApp(firebaseConfig);
        
        if (typeof gtag !== 'undefined') {
            firebase.analytics();
        }
        
        console.log('🔥 Firebase initialized for REMAS AL-FALAAH');
    }
}

// Utility functions for REMAS website
const REMASFirebase = {
    // Log page views
    logPageView: function(pageName) {
        if (typeof gtag !== 'undefined') {
            gtag('config', firebaseConfig.measurementId, {
                page_title: pageName,
                page_location: window.location.href
            });
        }
    },
    
    // Track events
    trackEvent: function(eventName, parameters = {}) {
        if (typeof gtag !== 'undefined') {
            gtag('event', eventName, {
                ...parameters,
                app_name: 'REMAS AL-FALAAH',
                app_version: '1.0.0'
            });
        }
    },
    
    // Track kegiatan views
    trackKegiatanView: function(kegiatanName, kegiatanId = null) {
        this.trackEvent('view_kegiatan', {
            kegiatan_name: kegiatanName,
            kegiatan_id: kegiatanId,
            content_type: 'kegiatan'
        });
    },
    
    // Track admin actions
    trackAdminAction: function(action, details = {}) {
        this.trackEvent('admin_action', {
            action: action,
            ...details,
            user_type: 'admin'
        });
    }
};

// Auto-track page views on load
if (typeof window !== 'undefined') {
    window.addEventListener('load', function() {
        const pageName = document.title || 'REMAS AL-FALAAH';
        REMASFirebase.logPageView(pageName);
        
        // Track specific page types
        if (window.location.pathname.includes('/kegiatan/')) {
            const kegiatanName = document.querySelector('h1, .kegiatan-title')?.textContent || 'Unknown Kegiatan';
            REMASFirebase.trackKegiatanView(kegiatanName);
        } else if (window.location.pathname.includes('/admin')) {
            REMASFirebase.trackEvent('admin_page_view', {
                admin_page: window.location.pathname
            });
        }
    });
}

// Make available globally
if (typeof window !== 'undefined') {
    window.REMASFirebase = REMASFirebase;
}