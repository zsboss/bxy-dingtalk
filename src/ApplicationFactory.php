<?php
    
    
    namespace Bxy\Dingtalk;
    
    
    use Hyperf\Contract\ConfigInterface;
    use Hyperf\Guzzle\ClientFactory;
    use Psr\Container\ContainerInterface;
    
    class ApplicationFactory
    {
        
        
        public function sendText($content, $at=[])
        {
            return make(RebotService::class)->sendText($content, $at);
        }
        
        public function sendLink($link)
        {
            return make(RebotService::class)->sendLink($link);
        }
        
        public function sendMarkdown($title, $text, $at=[])
        {
            return make(RebotService::class)->sendMarkdown($title, $text, $at);
        }
        
    }