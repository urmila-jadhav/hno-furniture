<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AI Interior Image Generator | Create Room Designs</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary: #8B4513;
            --primary-light: #A0522D;
            --secondary: #2C3E50;
            --accent: #E67E22;
            --light: #F9F5F0;
            --dark: #1A1A1A;
            --gray: #7F8C8D;
            --success: #27AE60;
            --transition: all 0.3s ease;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: #333;
            line-height: 1.6;
            min-height: 100vh;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        /* Header */
        .header {
            text-align: center;
            margin-bottom: 40px;
            color: white;
            text-shadow: 0 2px 10px rgba(0,0,0,0.3);
        }

        .header h1 {
            font-size: 3.5rem;
            margin-bottom: 10px;
            background: linear-gradient(45deg, #fff, #f0f0f0);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .header p {
            font-size: 1.2rem;
            opacity: 0.9;
            max-width: 600px;
            margin: 0 auto;
        }

        /* Main Content */
        .main-content {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 40px;
            background: white;
            border-radius: 20px;
            padding: 40px;
            box-shadow: 0 20px 60px rgba(0,0,0,0.3);
            min-height: 600px;
        }

        @media (max-width: 992px) {
            .main-content {
                grid-template-columns: 1fr;
            }
        }

        /* Input Panel */
        .input-panel {
            background: var(--light);
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        }

        .input-group {
            margin-bottom: 25px;
        }

        .input-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: var(--secondary);
            font-size: 1.1rem;
        }

        .input-group input,
        .input-group select,
        .input-group textarea {
            width: 100%;
            padding: 14px;
            border: 2px solid #ddd;
            border-radius: 10px;
            font-size: 1rem;
            transition: var(--transition);
            font-family: inherit;
        }

        .input-group input:focus,
        .input-group select:focus,
        .input-group textarea:focus {
            border-color: var(--accent);
            outline: none;
            box-shadow: 0 0 0 3px rgba(230, 126, 34, 0.1);
        }

        .input-group textarea {
            height: 120px;
            resize: vertical;
        }

        /* Style Tags */
        .style-tags {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            margin-top: 10px;
        }

        .style-tag {
            background: white;
            border: 2px solid #ddd;
            padding: 8px 16px;
            border-radius: 20px;
            cursor: pointer;
            transition: var(--transition);
            font-size: 0.9rem;
        }

        .style-tag:hover {
            border-color: var(--accent);
            color: var(--accent);
        }

        .style-tag.active {
            background: var(--accent);
            color: white;
            border-color: var(--accent);
        }

        /* Generate Button */
        .generate-btn {
            background: linear-gradient(135deg, var(--accent) 0%, #d35400 100%);
            color: white;
            border: none;
            padding: 18px 40px;
            border-radius: 12px;
            font-size: 1.2rem;
            font-weight: 600;
            cursor: pointer;
            transition: var(--transition);
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 12px;
            margin-top: 20px;
        }

        .generate-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 25px rgba(230, 126, 34, 0.4);
        }

        .generate-btn:disabled {
            opacity: 0.6;
            cursor: not-allowed;
            transform: none;
        }

        /* Output Panel */
        .output-panel {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .output-container {
            flex: 1;
            background: var(--light);
            border-radius: 15px;
            overflow: hidden;
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 400px;
            position: relative;
            box-shadow: inset 0 0 20px rgba(0,0,0,0.1);
        }

        .output-image {
            max-width: 100%;
            max-height: 100%;
            display: none;
            border-radius: 10px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.2);
        }

        .output-image.loaded {
            display: block;
            animation: fadeIn 0.5s ease;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: scale(0.95); }
            to { opacity: 1; transform: scale(1); }
        }

        /* Loading Animation */
        .loading-container {
            display: none;
            text-align: center;
            padding: 40px;
        }

        .loading-container.active {
            display: block;
        }

        .ai-loader {
            display: inline-block;
            width: 80px;
            height: 80px;
            margin-bottom: 20px;
        }

        .ai-loader:after {
            content: " ";
            display: block;
            width: 64px;
            height: 64px;
            margin: 8px;
            border-radius: 50%;
            border: 6px solid var(--accent);
            border-color: var(--accent) transparent var(--accent) transparent;
            animation: ai-loader 1.2s linear infinite;
        }

        @keyframes ai-loader {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        /* Preset Buttons */
        .presets {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 15px;
            margin-top: 10px;
        }

        .preset-btn {
            background: white;
            border: 2px solid #ddd;
            padding: 12px;
            border-radius: 10px;
            cursor: pointer;
            transition: var(--transition);
            text-align: center;
        }

        .preset-btn:hover {
            border-color: var(--accent);
            transform: translateY(-2px);
        }

        .preset-btn i {
            display: block;
            font-size: 24px;
            margin-bottom: 8px;
            color: var(--accent);
        }

        /* Advanced Options */
        .advanced-options {
            margin-top: 30px;
            padding: 20px;
            background: white;
            border-radius: 10px;
            border-left: 4px solid var(--accent);
        }

        .advanced-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 15px;
            cursor: pointer;
        }

        .advanced-content {
            display: none;
        }

        .advanced-content.show {
            display: block;
            animation: slideDown 0.3s ease;
        }

        @keyframes slideDown {
            from { opacity: 0; transform: translateY(-10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .slider-container {
            margin-bottom: 15px;
        }

        .slider-label {
            display: flex;
            justify-content: space-between;
            margin-bottom: 5px;
        }

        input[type="range"] {
            width: 100%;
            height: 8px;
            border-radius: 4px;
            background: #ddd;
            outline: none;
        }

        /* History */
        .history-section {
            margin-top: 40px;
            background: white;
            border-radius: 15px;
            padding: 30px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        }

        .history-title {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .history-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(150px, 1fr));
            gap: 15px;
        }

        .history-item {
            border-radius: 10px;
            overflow: hidden;
            cursor: pointer;
            transition: var(--transition);
            position: relative;
        }

        .history-item:hover {
            transform: scale(1.05);
            box-shadow: 0 10px 20px rgba(0,0,0,0.2);
        }

        .history-item img {
            width: 100%;
            height: 120px;
            object-fit: cover;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .header h1 {
                font-size: 2.5rem;
            }
            
            .main-content {
                padding: 20px;
            }
            
            .presets {
                grid-template-columns: repeat(2, 1fr);
            }
            
            .history-grid {
                grid-template-columns: repeat(auto-fill, minmax(120px, 1fr));
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1><i class="fas fa-robot"></i> AI Interior Generator</h1>
            <p>Describe your dream room and watch AI generate it in seconds</p>
        </div>

        <div class="main-content">
            <!-- Input Panel -->
            <div class="input-panel">
                <div class="input-group">
                    <label for="roomType"><i class="fas fa-door-open"></i> Room Type</label>
                    <select id="roomType">
                        <option value="living room">Living Room</option>
                        <option value="bedroom">Bedroom</option>
                        <option value="kitchen">Kitchen</option>
                        <option value="dining room">Dining Room</option>
                        <option value="home office">Home Office</option>
                        <option value="bathroom">Bathroom</option>
                        <option value="studio apartment">Studio Apartment</option>
                        <option value="library">Library</option>
                    </select>
                </div>

                <div class="input-group">
                    <label for="roomDescription"><i class="fas fa-edit"></i> Room Description</label>
                    <textarea id="roomDescription" placeholder="Describe your room in detail... 
Example: A modern living room with large windows, leather sofa, wooden coffee table, plants, and abstract art on the walls"></textarea>
                </div>

                <div class="input-group">
                    <label><i class="fas fa-palette"></i> Design Style</label>
                    <div class="style-tags">
                        <span class="style-tag active" data-style="modern">Modern</span>
                        <span class="style-tag" data-style="minimalist">Minimalist</span>
                        <span class="style-tag" data-style="scandinavian">Scandinavian</span>
                        <span class="style-tag" data-style="industrial">Industrial</span>
                        <span class="style-tag" data-style="bohemian">Bohemian</span>
                        <span class="style-tag" data-style="traditional">Traditional</span>
                        <span class="style-tag" data-style="luxury">Luxury</span>
                        <span class="style-tag" data-style="rustic">Rustic</span>
                    </div>
                </div>

                <div class="input-group">
                    <label><i class="fas fa-bolt"></i> Quick Presets</label>
                    <div class="presets">
                        <div class="preset-btn" data-preset="cozy">
                            <i class="fas fa-couch"></i>
                            <span>Cozy Living</span>
                        </div>
                        <div class="preset-btn" data-preset="modern">
                            <i class="fas fa-building"></i>
                            <span>Modern Office</span>
                        </div>
                        <div class="preset-btn" data-preset="luxury">
                            <i class="fas fa-gem"></i>
                            <span>Luxury Bedroom</span>
                        </div>
                        <div class="preset-btn" data-preset="minimal">
                            <i class="fas fa-border-none"></i>
                            <span>Minimal Kitchen</span>
                        </div>
                        <div class="preset-btn" data-preset="nature">
                            <i class="fas fa-leaf"></i>
                            <span>Nature Theme</span>
                        </div>
                        <div class="preset-btn" data-preset="vintage">
                            <i class="fas fa-history"></i>
                            <span>Vintage Style</span>
                        </div>
                    </div>
                </div>

                <!-- Advanced Options -->
                <div class="advanced-options">
                    <div class="advanced-header" id="advancedToggle">
                        <h3><i class="fas fa-sliders-h"></i> Advanced Options</h3>
                        <i class="fas fa-chevron-down"></i>
                    </div>
                    <div class="advanced-content" id="advancedContent">
                        <div class="slider-container">
                            <div class="slider-label">
                                <span>Image Quality</span>
                                <span id="qualityValue">Medium</span>
                            </div>
                            <input type="range" id="qualitySlider" min="1" max="3" value="2" step="1">
                        </div>
                        <div class="slider-container">
                            <div class="slider-label">
                                <span>Creativity Level</span>
                                <span id="creativityValue">Balanced</span>
                            </div>
                            <input type="range" id="creativitySlider" min="1" max="3" value="2" step="1">
                        </div>
                    </div>
                </div>

                <button class="generate-btn" id="generateBtn">
                    <i class="fas fa-magic"></i>
                    Generate Interior Design
                </button>
            </div>

            <!-- Output Panel -->
            <div class="output-panel">
                <div class="output-container">
                    <div class="loading-container" id="loadingContainer">
                        <div class="ai-loader"></div>
                        <h3 style="color: var(--secondary); margin-bottom: 10px;">AI is Creating Your Room</h3>
                        <p style="color: var(--gray);">This may take 15-30 seconds...</p>
                        <div style="margin-top: 20px; font-size: 0.9rem; color: var(--gray);">
                            <i class="fas fa-info-circle"></i> Generating high-quality image via AI
                        </div>
                    </div>
                    
                    <img id="outputImage" class="output-image" alt="Generated Interior">
                    
                    <div id="placeholder" style="text-align: center; color: var(--gray); padding: 40px;">
                        <i class="fas fa-image" style="font-size: 60px; margin-bottom: 20px; opacity: 0.3;"></i>
                        <h3>Your AI-generated interior will appear here</h3>
                        <p>Describe your room and click "Generate"</p>
                    </div>
                </div>

                <div style="display: flex; gap: 10px;">
                    <button id="downloadBtn" class="generate-btn" style="background: var(--success); display: none;">
                        <i class="fas fa-download"></i>
                        Download Image
                    </button>
                    <button id="regenerateBtn" class="generate-btn" style="background: var(--secondary);">
                        <i class="fas fa-redo"></i>
                        Generate Another
                    </button>
                </div>
            </div>
        </div>

        <!-- History Section -->
        <div class="history-section" id="historySection">
            <div class="history-title">
                <h2><i class="fas fa-history"></i> Generation History</h2>
                <button id="clearHistory" style="background: none; border: none; color: var(--accent); cursor: pointer;">
                    <i class="fas fa-trash"></i> Clear
                </button>
            </div>
            <div class="history-grid" id="historyGrid">
                <!-- History items will be added here -->
            </div>
        </div>
    </div>

    <script>
        // Configuration - Replace with your own API keys
        const API_CONFIG = {
            // Option 1: Replicate API (Stable Diffusion)
            REPLICATE_API_KEY: 'YOUR_REPLICATE_API_KEY',
            REPLICATE_MODEL: 'stability-ai/stable-diffusion',
            
            // Option 2: OpenAI DALL-E (if you have access)
            OPENAI_API_KEY: 'YOUR_OPENAI_API_KEY',
            
            // Option 3: Free alternative - Hugging Face
            HUGGING_FACE_API_KEY: 'YOUR_HF_API_KEY',
            
            // Current active API
            ACTIVE_API: 'REPLICATE' // Options: REPLICATE, OPENAI, HUGGINGFACE
        };

        // Preset configurations
        const PRESETS = {
            cozy: {
                roomType: 'living room',
                description: 'A cozy living room with comfortable sofa, warm lighting, fireplace, bookshelf, soft rugs, and plants. Evening atmosphere with lamps glowing.',
                style: 'scandinavian'
            },
            modern: {
                roomType: 'home office',
                description: 'Modern home office with clean lines, glass desk, ergonomic chair, floating shelves, tech gadgets, minimalist decor, and large windows with city view.',
                style: 'modern'
            },
            luxury: {
                roomType: 'bedroom',
                description: 'Luxury master bedroom with king size bed, silk sheets, chandelier, walk-in closet, marble bathroom, gold accents, and panoramic windows.',
                style: 'luxury'
            },
            minimal: {
                roomType: 'kitchen',
                description: 'Minimalist kitchen with white cabinets, marble countertops, stainless steel appliances, hidden storage, and natural light.',
                style: 'minimalist'
            },
            nature: {
                roomType: 'living room',
                description: 'Biophilic living room with indoor plants, natural materials, wooden furniture, green walls, skylight, and water feature.',
                style: 'bohemian'
            },
            vintage: {
                roomType: 'dining room',
                description: 'Vintage dining room with antique wooden table, velvet chairs, crystal chandelier, Persian rug, and classic artwork.',
                style: 'traditional'
            }
        };

        // DOM Elements
        const roomTypeSelect = document.getElementById('roomType');
        const roomDescription = document.getElementById('roomDescription');
        const styleTags = document.querySelectorAll('.style-tag');
        const presetButtons = document.querySelectorAll('.preset-btn');
        const generateBtn = document.getElementById('generateBtn');
        const outputImage = document.getElementById('outputImage');
        const loadingContainer = document.getElementById('loadingContainer');
        const placeholder = document.getElementById('placeholder');
        const downloadBtn = document.getElementById('downloadBtn');
        const regenerateBtn = document.getElementById('regenerateBtn');
        const advancedToggle = document.getElementById('advancedToggle');
        const advancedContent = document.getElementById('advancedContent');
        const qualitySlider = document.getElementById('qualitySlider');
        const qualityValue = document.getElementById('qualityValue');
        const creativitySlider = document.getElementById('creativitySlider');
        const creativityValue = document.getElementById('creativityValue');
        const historyGrid = document.getElementById('historyGrid');
        const clearHistoryBtn = document.getElementById('clearHistory');
        const historySection = document.getElementById('historySection');

        // State
        let currentStyle = 'modern';
        let generationHistory = JSON.parse(localStorage.getItem('interiorHistory') || '[]');
        let currentImageData = null;

        // Initialize
        function init() {
            loadHistory();
            setupEventListeners();
        }

        function setupEventListeners() {
            // Style tags
            styleTags.forEach(tag => {
                tag.addEventListener('click', () => {
                    styleTags.forEach(t => t.classList.remove('active'));
                    tag.classList.add('active');
                    currentStyle = tag.dataset.style;
                });
            });

            // Preset buttons
            presetButtons.forEach(btn => {
                btn.addEventListener('click', () => {
                    const preset = PRESETS[btn.dataset.preset];
                    roomTypeSelect.value = preset.roomType;
                    roomDescription.value = preset.description;
                    
                    // Set style
                    styleTags.forEach(tag => {
                        tag.classList.toggle('active', tag.dataset.style === preset.style);
                        if (tag.dataset.style === preset.style) {
                            currentStyle = preset.style;
                        }
                    });
                });
            });

            // Generate button
            generateBtn.addEventListener('click', generateImage);

            // Regenerate button
            regenerateBtn.addEventListener('click', generateImage);

            // Download button
            downloadBtn.addEventListener('click', downloadImage);

            // Advanced options toggle
            advancedToggle.addEventListener('click', () => {
                advancedContent.classList.toggle('show');
                const icon = advancedToggle.querySelector('i');
                icon.classList.toggle('fa-chevron-down');
                icon.classList.toggle('fa-chevron-up');
            });

            // Quality slider
            qualitySlider.addEventListener('input', () => {
                const values = ['Low', 'Medium', 'High'];
                qualityValue.textContent = values[qualitySlider.value - 1];
            });

            // Creativity slider
            creativitySlider.addEventListener('input', () => {
                const values = ['Realistic', 'Balanced', 'Creative'];
                creativityValue.textContent = values[creativitySlider.value - 1];
            });

            // Clear history
            clearHistoryBtn.addEventListener('click', clearHistory);
        }

        // Generate AI Image
        async function generateImage() {
            const roomType = roomTypeSelect.value;
            const description = roomDescription.value.trim();
            const quality = qualitySlider.value;
            const creativity = creativitySlider.value;

            if (!description) {
                alert('Please describe your room first!');
                roomDescription.focus();
                return;
            }

            // Build prompt
            const prompt = buildPrompt(roomType, description, currentStyle, creativity);

            // Show loading
            loadingContainer.classList.add('active');
            placeholder.style.display = 'none';
            outputImage.classList.remove('loaded');
            generateBtn.disabled = true;
            generateBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Generating...';

            try {
                // Generate image based on selected API
                const imageUrl = await generateWithAI(prompt, quality);
                
                if (imageUrl) {
                    // Display image
                    outputImage.src = imageUrl;
                    outputImage.onload = () => {
                        loadingContainer.classList.remove('active');
                        outputImage.classList.add('loaded');
                        downloadBtn.style.display = 'block';
                        currentImageData = {
                            url: imageUrl,
                            prompt: prompt,
                            timestamp: new Date().toISOString()
                        };
                        
                        // Save to history
                        saveToHistory(currentImageData);
                    };
                } else {
                    // Fallback to demo image if API fails
                    useDemoImage(prompt);
                }
            } catch (error) {
                console.error('Generation error:', error);
                useDemoImage(prompt);
            } finally {
                generateBtn.disabled = false;
                generateBtn.innerHTML = '<i class="fas fa-magic"></i> Generate Interior Design';
            }
        }

        // Build prompt for AI
        function buildPrompt(roomType, description, style, creativity) {
            const styleDescriptors = {
                modern: "modern, contemporary, clean lines, sleek",
                minimalist: "minimalist, simple, uncluttered, clean",
                scandinavian: "scandinavian, light wood, cozy, hygge, natural light",
                industrial: "industrial, raw materials, exposed brick, metal, loft-style",
                bohemian: "bohemian, eclectic, colorful, patterned, layered textiles",
                traditional: "traditional, classic, ornate, detailed, elegant",
                luxury: "luxury, high-end, premium materials, sophisticated, opulent",
                rustic: "rustic, natural materials, weathered, cozy, cabin-like"
            };

            const creativityLevels = {
                1: "photorealistic, realistic, detailed, accurate",
                2: "artistic, well-designed, balanced composition",
                3: "creative, imaginative, unique, artistic interpretation"
            };

            return `Interior design of a ${roomType}, ${description}, ${styleDescriptors[style] || style}, 
                    ${creativityLevels[creativity] || "well-designed"}, professional interior photography, 
                    high quality, 4k, detailed, architectural digest, wide angle`;
        }

        // AI Generation Function
        async function generateWithAI(prompt, quality) {
            // Note: In a real implementation, you would call an actual AI API here
            // For demo purposes, we'll use a placeholder and fallback
            
            // Try different APIs based on configuration
            switch (API_CONFIG.ACTIVE_API) {
                case 'REPLICATE':
                    return await generateWithReplicate(prompt, quality);
                case 'OPENAI':
                    return await generateWithOpenAI(prompt, quality);
                case 'HUGGINGFACE':
                    return await generateWithHuggingFace(prompt, quality);
                default:
                    // Fallback to demo image
                    return null;
            }
        }

        // Demo function for Replicate API
        async function generateWithReplicate(prompt, quality) {
            // This is a mock implementation
            // Real implementation would use:
            // const response = await fetch('https://api.replicate.com/v1/predictions', {
            //     method: 'POST',
            //     headers: {
            //         'Authorization': `Token ${API_CONFIG.REPLICATE_API_KEY}`,
            //         'Content-Type': 'application/json',
            //     },
            //     body: JSON.stringify({
            //         version: "db21e45d3f7023abc2a46ee38a23973f6dce16bb082a930b0c49861f96d1e5bf",
            //         input: {
            //             prompt: prompt,
            //             width: quality === '3' ? 1024 : quality === '2' ? 768 : 512,
            //             height: quality === '3' ? 1024 : quality === '2' ? 768 : 512,
            //             num_inference_steps: 50
            //         }
            //     })
            // });
            
            // Simulate API delay
            await new Promise(resolve => setTimeout(resolve, 2000));
            
            // Return a placeholder image (in real app, this would be the actual generated image URL)
            // For demo, we'll return a random interior image from Unsplash based on prompt
            const style = currentStyle;
            const room = roomTypeSelect.value;
            
            // Map styles and rooms to Unsplash images
            const imageMap = {
                'modern living room': 'https://images.unsplash.com/photo-1586023492125-27b2c045efd7?w=800&fit=crop',
                'modern bedroom': 'https://images.unsplash.com/photo-1505693416388-ac5ce068fe85?w=800&fit=crop',
                'modern kitchen': 'https://images.unsplash.com/photo-1556909114-f6e7ad7d3136?w=800&fit=crop',
                'minimalist living room': 'https://images.unsplash.com/photo-1512917774080-9991f1c4c750?w=800&fit=crop',
                'scandinavian bedroom': 'https://images.unsplash.com/photo-1505693416388-ac5ce068fe85?w=800&fit=crop',
                'luxury bedroom': 'https://images.unsplash.com/photo-1616594039964-ae9021a400a0?w=800&fit=crop',
                'industrial living room': 'https://images.unsplash.com/photo-1537726235470-8504e3beef77?w=800&fit=crop',
                'bohemian living room': 'https://images.unsplash.com/photo-1556228453-efd6c1ff04f6?w=800&fit=crop'
            };
            
            const key = `${style} ${room}`;
            return imageMap[key] || 'https://images.unsplash.com/photo-1586023492125-27b2c045efd7?w=800&fit=crop';
        }

        // Demo image fallback
        function useDemoImage(prompt) {
            loadingContainer.classList.remove('active');
            
            // Create a "generated" image using Canvas (simulated AI generation)
            const canvas = document.createElement('canvas');
            const ctx = canvas.getContext('2d');
            canvas.width = 800;
            canvas.height = 600;
            
            // Draw a simulated interior
            drawSimulatedInterior(ctx, canvas.width, canvas.height, prompt);
            
            // Convert to data URL
            const dataUrl = canvas.toDataURL('image/jpeg', 0.9);
            
            // Display
            outputImage.src = dataUrl;
            outputImage.onload = () => {
                outputImage.classList.add('loaded');
                downloadBtn.style.display = 'block';
                currentImageData = {
                    url: dataUrl,
                    prompt: prompt,
                    timestamp: new Date().toISOString()
                };
                saveToHistory(currentImageData);
            };
        }

        // Draw a simulated interior (for demo purposes)
        function drawSimulatedInterior(ctx, width, height, prompt) {
            // Background
            ctx.fillStyle = '#f5f5f5';
            ctx.fillRect(0, 0, width, height);
            
            // Floor
            ctx.fillStyle = '#8B4513';
            ctx.fillRect(0, height * 0.7, width, height * 0.3);
            
            // Wall
            ctx.fillStyle = '#f0e6d3';
            ctx.fillRect(0, 0, width, height * 0.7);
            
            // Window
            ctx.fillStyle = '#87CEEB';
            ctx.fillRect(width * 0.6, height * 0.1, width * 0.3, height * 0.4);
            
            // Sofa
            ctx.fillStyle = '#4A90E2';
            ctx.fillRect(width * 0.1, height * 0.5, width * 0.3, height * 0.15);
            
            // Coffee table
            ctx.fillStyle = '#A0522D';
            ctx.fillRect(width * 0.45, height * 0.6, width * 0.15, height * 0.05);
            
            // Plant
            ctx.fillStyle = '#27AE60';
            ctx.beginPath();
            ctx.arc(width * 0.8, height * 0.65, 30, 0, Math.PI * 2);
            ctx.fill();
            
            // Text indicating AI generation
            ctx.fillStyle = '#333';
            ctx.font = 'bold 20px Arial';
            ctx.textAlign = 'center';
            ctx.fillText('AI Generated Interior', width / 2, 50);
            
            ctx.font = '14px Arial';
            ctx.fillStyle = '#666';
            const words = prompt.split(' ');
            let line = '';
            let y = 80;
            
            for (let i = 0; i < Math.min(words.length, 10); i++) {
                line += words[i] + ' ';
                if (i % 5 === 4 || i === words.length - 1) {
                    ctx.fillText(line.trim(), width / 2, y);
                    line = '';
                    y += 20;
                }
            }
        }

        // Download image
        function downloadImage() {
            if (!currentImageData) return;
            
            const link = document.createElement('a');
            link.href = currentImageData.url;
            link.download = `interior-design-${Date.now()}.jpg`;
            document.body.appendChild(link);
            link.click();
            document.body.removeChild(link);
        }

        // History functions
        function saveToHistory(imageData) {
            generationHistory.unshift(imageData);
            if (generationHistory.length > 12) {
                generationHistory = generationHistory.slice(0, 12);
            }
            localStorage.setItem('interiorHistory', JSON.stringify(generationHistory));
            loadHistory();
        }

        function loadHistory() {
            historyGrid.innerHTML = '';
            
            if (generationHistory.length === 0) {
                historySection.style.display = 'none';
                return;
            }
            
            historySection.style.display = 'block';
            
            generationHistory.forEach((item, index) => {
                const div = document.createElement('div');
                div.className = 'history-item';
                div.innerHTML = `<img src="${item.url}" alt="Generated interior ${index + 1}">`;
                
                div.addEventListener('click', () => {
                    outputImage.src = item.url;
                    outputImage.classList.add('loaded');
                    placeholder.style.display = 'none';
                    loadingContainer.classList.remove('active');
                    downloadBtn.style.display = 'block';
                    currentImageData = item;
                });
                
                historyGrid.appendChild(div);
            });
        }

        function clearHistory() {
            if (confirm('Clear all generation history?')) {
                generationHistory = [];
                localStorage.removeItem('interiorHistory');
                loadHistory();
            }
        }

        // Initialize the app
        init();

        // Instructions for setting up real API
        console.log(`
        =============================================
        AI INTERIOR GENERATOR - SETUP INSTRUCTIONS
        =============================================
        
        To use real AI image generation, you need to:
        
        1. GET AN API KEY:
           - Replicate (Recommended): https://replicate.com/
           - OpenAI DALL-E: https://platform.openai.com/
           - Hugging Face: https://huggingface.co/
        
        2. UPDATE API_CONFIG object in the script:
           - Replace 'YOUR_API_KEY' with your actual key
           - Choose which API to use: REPLICATE, OPENAI, or HUGGINGFACE
        
        3. UNCOMMENT the actual API calls in generateWithReplicate() function
        
        For now, the app uses demo images and simulated generation.
        `);
    </script>
</body>
</html>