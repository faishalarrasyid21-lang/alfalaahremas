#!/bin/bash

echo "🔥 FIREBASE SETUP & DEPLOYMENT SCRIPT"
echo "===================================="
echo ""

echo "📦 Building Laravel assets..."
npm run build

echo ""
echo "🗂️  Copying built files to public directory..."
# Make sure all assets are in public folder for Firebase hosting

echo ""
echo "🧪 Testing Firebase configuration..."
echo "Visit: http://127.0.0.1:8000/firebase-test.html"

echo ""
echo "🚀 Ready for Firebase deployment!"
echo "Run the following commands:"
echo ""
echo "1. Login to Firebase:"
echo "   firebase login"
echo ""
echo "2. Deploy to Firebase Hosting:"
echo "   firebase deploy --only hosting"
echo ""
echo "3. Test deployment:"
echo "   firebase hosting:channel:open preview"
echo ""

echo "📋 Firebase Project Info:"
echo "   Project ID: alfalaahremascom"
echo "   Site: remascom"
echo "   Auth Domain: alfalaahremascom.firebaseapp.com"
echo ""

echo "✅ Setup completed successfully!"
echo "🌐 Local test URL: http://127.0.0.1:8000/firebase-test.html"
echo "🌐 Main website: http://127.0.0.1:8000/kegiatan"