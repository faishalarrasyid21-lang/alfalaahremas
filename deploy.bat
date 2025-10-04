@echo off
echo ====================================
echo    REMAS Website Deployment Script
echo ====================================

echo [1/4] Copying public files...
if not exist "deploy" mkdir deploy
xcopy "public\*" "deploy\" /E /Y /I

echo [2/4] Copying important Laravel files...
copy "public\index.php" "deploy\"
copy "public\.htaccess" "deploy\"

echo [3/4] Creating deployment info...
echo Website: REMAS AL-FALAAH > deploy\deployment-info.txt
echo Date: %date% %time% >> deploy\deployment-info.txt
echo Ready for hosting deployment >> deploy\deployment-info.txt

echo [4/4] Deployment package ready!
echo.
echo ====================================
echo Files ready in 'deploy' folder
echo Upload contents to your hosting
echo ====================================
pause