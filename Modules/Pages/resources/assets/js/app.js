$(document).ready(function () {
    const editor = new EditorJs({
        holder: 'editorjs-content',
        tools: {
            header: {
                class: Header,
                inlineToolbar: true
            },
            paragraph: {
                class: Paragraph,
                inlineToolbar: true
            },
            list: {
                class: List,
                inlineToolbar: true
            },
            image: {
                class: ImageTool,
                config: {
                    endpoints: {
                        byFile: '/uploadImage', // Replace with your image upload endpoint
                        byUrl: '/fetchImage' // Replace with your image fetch endpoint
                    }
                }
            },
            code: {
                class: CodeTool,
                shortcut: 'CMD+SHIFT+C'
            },
            link: {
                class: LinkTool,
                config: {
                    endpoint: '/fetchLinkData' // Replace with your link fetch endpoint
                }
            },
            // Add more tools as needed
        }
    });
});
