<?php
    
    
    namespace Bxy\Dingtalk;
    
    
    use Hyperf\Contract\ConfigInterface;
    use Hyperf\Guzzle\ClientFactory;
    
    class RebotService
    {
        /**
         * @var ClientFactory
         */
        private $clientFactory;
        /**
         * @var ConfigInterface
         */
        private $config;
        
        public function __construct(ClientFactory $clientFactory, ConfigInterface $config)
        {
            //
            $this->clientFactory=$clientFactory;
            $this->config       =$config;
        }
        
        public function sendText($content, array $at=[])
        {
            $data=[
                'msgtype'=>'text',
                'text'=>[
                    'content'=>$content,
                ],
                'at'=>$at,
            ];
            return $this->send($data);
        }
        /**
         * @desc   发送link类型数据
         * @author limx
         * @param array $link
         * @return \Psr\Http\Message\ResponseInterface
         */
        public function sendLink(array $link = [])
        {
            $data = [
                'msgtype' => 'link',
                'link' => [
                    'text' => $link['text'],
                    'title' => $link['title'],
                    'picUrl' => $link['picUrl'],
                    'messageUrl' => $link['messageUrl'],
                ],
            ];
        
            return $this->send($data);
        }
        /**
         * @desc   发送Markdown消息
         * @author limx
         * @param string $title
         * @param string $text
         * @param array  $at
         * @return \Psr\Http\Message\ResponseInterface
         */
        public function sendMarkdown($title, $text, array $at = [])
        {
            $data = [
                'msgtype' => 'markdown',
                'markdown' => [
                    'text' => $text,
                    'title' => $title,
                ],
                'at' => $at
            ];
        
            return $this->send($data);
        }
        private function send($data=[])
        {
            $client=$this->clientFactory->create(['timeout'=>5]);
            $response=$client->post($this->config->get('dingtalk.url'),['json'=>$data]);
            return $response->getBody()->getContents();
        }
        
        
    }