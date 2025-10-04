Write-Host "FIREBASE SETUP & DEPLOYMENT SCRIPT" -ForegroundColor Green
Write-Host "====================================" -ForegroundColor Green
Write-Host ""

Write-Host "Building Laravel assets..." -ForegroundColor Yellow
npm run build

Write-Host ""
Write-Host "Assets built successfully!" -ForegroundColor Green

Write-Host ""
Write-Host "Testing Firebase configuration..." -ForegroundColor Yellow
Write-Host "Visit: http://127.0.0.1:8000/firebase-test.html" -ForegroundColor Cyan

Write-Host ""
Write-Host "Ready for Firebase deployment!" -ForegroundColor Green
Write-Host "Run the following commands:" -ForegroundColor Yellow
Write-Host ""
Write-Host "1. Login to Firebase:" -ForegroundColor White
Write-Host "   firebase login" -ForegroundColor Cyan
Write-Host ""
Write-Host "2. Deploy to Firebase Hosting:" -ForegroundColor White
Write-Host "   firebase deploy --only hosting" -ForegroundColor Cyan
Write-Host ""
Write-Host "3. Test deployment:" -ForegroundColor White
Write-Host "   firebase hosting:channel:open preview" -ForegroundColor Cyan
Write-Host ""

Write-Host "Firebase Project Info:" -ForegroundColor Yellow
Write-Host "   Project ID: alfalaahremascom" -ForegroundColor White
Write-Host "   Site: remascom" -ForegroundColor White
Write-Host "   Auth Domain: alfalaahremascom.firebaseapp.com" -ForegroundColor White
Write-Host ""

Write-Host "Setup completed successfully!" -ForegroundColor Green
Write-Host "Local test URL: http://127.0.0.1:8000/firebase-test.html" -ForegroundColor Cyan
Write-Host "Main website: http://127.0.0.1:8000/kegiatan" -ForegroundColor Cyan

Write-Host ""
Write-Host "Press any key to continue..." -ForegroundColor Gray
$null = $Host.UI.RawUI.ReadKey("NoEcho,IncludeKeyDown")