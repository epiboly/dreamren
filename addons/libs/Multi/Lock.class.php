<?php
class Lock
{
    /**
     * filePath
     * 文件路径
     * @var mixed
     * @access private
     */
    private $filePath;
    private $targetFile;


    /**
     * fileName
     * 文件名，包含完整路径
     * @var mixed
     * @access private
     */
    private $fileName;

    public function Lock($file)
    {
        $this->targetFile = $file;
    }

    public function sh()
    {
        flock($this->targetFile->getHandle(),LOCK_SH);
    }


    public function ex()
    {
        flock($this->targetFile->getHandle(),LOCK_EX);
    }

    public function nb()
    {
        flock($this->targetFile->getHandle(),LOCK_NB);
    }

    public function unlock()
    {
        flock($this->targetFile->getHandle(),LOCK_UN);
    }
}
