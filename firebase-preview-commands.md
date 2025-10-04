# Firebase Hosting Preview Channels Commands for REMAS Project

# 1. Deploy to preview channel
npx firebase-tools hosting:channel:deploy preview_name --project remas-al-falaah

# 2. Deploy to preview with specific site target
npx firebase-tools hosting:channel:deploy preview_name --only hosting:remascom

# 3. Deploy with custom expiration (default is 7 days)
npx firebase-tools hosting:channel:deploy preview_name --expires 14d

# 4. List all channels
npx firebase-tools hosting:channel:list

# 5. Open preview URL
npx firebase-tools hosting:channel:open preview_name

# 6. Delete preview channel
npx firebase-tools hosting:channel:delete preview_name

# Examples for different environments:
# Development preview
npx firebase-tools hosting:channel:deploy dev-preview

# Feature testing
npx firebase-tools hosting:channel:deploy feature-carousel

# Staging environment  
npx firebase-tools hosting:channel:deploy staging

# Pull request preview
npx firebase-tools hosting:channel:deploy pr-123