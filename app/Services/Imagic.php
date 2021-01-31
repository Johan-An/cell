<?php

namespace App\Http\Services;

class Imagick implements Iterator {
	public adaptiveBlurImage ( float $radius , float $sigma , int $channel = Imagick::CHANNEL_DEFAULT ) : bool
	public adaptiveResizeImage ( int $columns , int $rows , bool $bestfit = false , bool $legacy = false ) : bool
	public adaptiveSharpenImage ( float $radius , float $sigma , int $channel = Imagick::CHANNEL_DEFAULT ) : bool
	public adaptiveThresholdImage ( int $width , int $height , int $offset ) : bool
	public addImage ( Imagick $source ) : bool
	public addNoiseImage ( int $noise_type , int $channel = Imagick::CHANNEL_DEFAULT ) : bool
	public affineTransformImage ( ImagickDraw $matrix ) : bool
	public animateImages ( string $x_server ) : bool
	public annotateImage ( ImagickDraw $draw_settings , float $x , float $y , float $angle , string $text ) : bool
	public appendImages ( bool $stack ) : Imagick
	public autoLevelImage ( int $channel = Imagick::CHANNEL_DEFAULT ) : bool
	public averageImages ( ) : Imagick
	public blackThresholdImage ( mixed $threshold ) : bool
	public blueShiftImage ( float $factor = 1.5 ) : bool
	public blurImage ( float $radius , float $sigma , int $channel = ? ) : bool
	public borderImage ( mixed $bordercolor , int $width , int $height ) : bool
	public brightnessContrastImage ( float $brightness , float $contrast , int $channel = Imagick::CHANNEL_DEFAULT ) : bool
	public charcoalImage ( float $radius , float $sigma ) : bool
	public chopImage ( int $width , int $height , int $x , int $y ) : bool
	public clampImage ( int $channel = Imagick::CHANNEL_DEFAULT ) : bool
	public clear ( ) : bool
	public clipImage ( ) : bool
	public clipImagePath ( string $pathname , string $inside ) : void
	public clipPathImage ( string $pathname , bool $inside ) : bool
	public clone ( ) : Imagick
	public clutImage ( Imagick $lookup_table , int $channel = Imagick::CHANNEL_DEFAULT ) : bool
	public coalesceImages ( ) : Imagick
	public colorFloodfillImage ( mixed $fill , float $fuzz , mixed $bordercolor , int $x , int $y ) : bool
	public colorizeImage ( mixed $colorize , mixed $opacity , bool $legacy = false ) : bool
	public colorMatrixImage ( array $color_matrix = Imagick::CHANNEL_DEFAULT ) : bool
	public combineImages ( int $channelType ) : Imagick
	public commentImage ( string $comment ) : bool
	public compareImageChannels ( Imagick $image , int $channelType , int $metricType ) : array
	public compareImageLayers ( int $method ) : Imagick
	public compareImages ( Imagick $compare , int $metric ) : array
	compositeImage ( Imagick $composite_object , int $composite , int $x , int $y , int $channel = Imagick::CHANNEL_ALL ) : bool
	public __construct ( mixed $files = ? )
	public contrastImage ( bool $sharpen ) : bool
	public contrastStretchImage ( float $black_point , float $white_point , int $channel = Imagick::CHANNEL_DEFAULT ) : bool
	public convolveImage ( array $kernel , int $channel = Imagick::CHANNEL_DEFAULT ) : bool
	public count ( int $mode = 0 ) : int
	cropImage ( int $width , int $height , int $x , int $y ) : bool
	cropThumbnailImage ( int $width , int $height ) : bool
	public current ( ) : Imagick
	public cycleColormapImage ( int $displace ) : bool
	public decipherImage ( string $passphrase ) : bool
	public deconstructImages ( ) : Imagick
	public deleteImageArtifact ( string $artifact ) : bool
	public deleteImageProperty ( string $name ) : bool
	public deskewImage ( float $threshold ) : bool
	public despeckleImage ( ) : bool
	public destroy ( ) : bool
	public displayImage ( string $servername ) : bool
	public displayImages ( string $servername ) : bool
	public distortImage ( int $method , array $arguments , bool $bestfit ) : bool
	drawImage ( ImagickDraw $draw ) : bool
	public edgeImage ( float $radius ) : bool
	public embossImage ( float $radius , float $sigma ) : bool
	public encipherImage ( string $passphrase ) : bool
	public enhanceImage ( ) : bool
	public equalizeImage ( ) : bool
	public evaluateImage ( int $op , float $constant , int $channel = Imagick::CHANNEL_DEFAULT ) : bool
	public exportImagePixels ( int $x , int $y , int $width , int $height , string $map , int $STORAGE ) : array
	public extentImage ( int $width , int $height , int $x , int $y ) : bool
	public filter ( ImagickKernel $ImagickKernel , int $channel = Imagick::CHANNEL_UNDEFINED ) : bool
	public flattenImages ( ) : Imagick
	public flipImage ( ) : bool
	public floodFillPaintImage ( mixed $fill , float $fuzz , mixed $target , int $x , int $y , bool $invert , int $channel = Imagick::CHANNEL_DEFAULT ) : bool
	public flopImage ( ) : bool
	public forwardFourierTransformimage ( bool $magnitude ) : bool
	public frameImage ( mixed $matte_color , int $width , int $height , int $inner_bevel , int $outer_bevel ) : bool
	public functionImage ( int $function , array $arguments , int $channel = Imagick::CHANNEL_DEFAULT ) : bool
	public fxImage ( string $expression , int $channel = Imagick::CHANNEL_DEFAULT ) : Imagick
	public gammaImage ( float $gamma , int $channel = Imagick::CHANNEL_DEFAULT ) : bool
	public gaussianBlurImage ( float $radius , float $sigma , int $channel = Imagick::CHANNEL_DEFAULT ) : bool
	public getColorspace ( ) : int
	public getCompression ( ) : int
	public getCompressionQuality ( ) : int
	public static getCopyright ( ) : string
	public getFilename ( ) : string
	public getFont ( ) : string
	public getFormat ( ) : string
	public getGravity ( ) : int
	public static getHomeURL ( ) : string
	public getImage ( ) : Imagick
	getImageAlphaChannel ( ) : int
	public getImageArtifact ( string $artifact ) : string
	public getImageAttribute ( string $key ) : string
	public getImageBackgroundColor ( ) : ImagickPixel
	public getImageBlob ( ) : string
	public getImageBluePrimary ( ) : array
	public getImageBorderColor ( ) : ImagickPixel
	public getImageChannelDepth ( int $channel ) : int
	public getImageChannelDistortion ( Imagick $reference , int $channel , int $metric ) : float
	public getImageChannelDistortions ( Imagick $reference , int $metric , int $channel = Imagick::CHANNEL_DEFAULT ) : float
	public getImageChannelExtrema ( int $channel ) : array
	public getImageChannelKurtosis ( int $channel = Imagick::CHANNEL_DEFAULT ) : array
	public getImageChannelMean ( int $channel ) : array
	public getImageChannelRange ( int $channel ) : array
	public getImageChannelStatistics ( ) : array
	public getImageClipMask ( ) : Imagick
	public getImageColormapColor ( int $index ) : ImagickPixel
	public getImageColors ( ) : int
	public getImageColorspace ( ) : int
	public getImageCompose ( ) : int
	public getImageCompression ( ) : int
	public getImageCompressionQuality ( ) : int
	public getImageDelay ( ) : int
	public getImageDepth ( ) : int
	public getImageDispose ( ) : int
	public getImageDistortion ( MagickWand $reference , int $metric ) : float
	public getImageExtrema ( ) : array
	public getImageFilename ( ) : string
	public getImageFormat ( ) : string
	public getImageGamma ( ) : float
	public getImageGeometry ( ) : array
	public getImageGravity ( ) : int
	public getImageGreenPrimary ( ) : array
	public getImageHeight ( ) : int
	public getImageHistogram ( ) : array
	public getImageIndex ( ) : int
	public getImageInterlaceScheme ( ) : int
	public getImageInterpolateMethod ( ) : int
	public getImageIterations ( ) : int
	public getImageLength ( ) : int
	public getImageMatte ( ) : bool
	public getImageMatteColor ( ) : ImagickPixel
	public getImageMimeType ( ) : string
	public getImageOrientation ( ) : int
	public getImagePage ( ) : array
	public getImagePixelColor ( int $x , int $y ) : ImagickPixel
	public getImageProfile ( string $name ) : string
	public getImageProfiles ( string $pattern = "*" , bool $include_values = true ) : array
	public getImageProperties ( string $pattern = "*" , bool $include_values = true ) : array
	public getImageProperty ( string $name ) : string
	public getImageRedPrimary ( ) : array
	public getImageRegion ( int $width , int $height , int $x , int $y ) : Imagick
	public getImageRenderingIntent ( ) : int
	getImageResolution ( ) : array
	public getImagesBlob ( ) : string
	public getImageScene ( ) : int
	public getImageSignature ( ) : string
	public getImageSize ( ) : int
	public getImageTicksPerSecond ( ) : int
	public getImageTotalInkDensity ( ) : float
	public getImageType ( ) : int
	getImageUnits ( ) : int
	public getImageVirtualPixelMethod ( ) : int
	public getImageWhitePoint ( ) : array
	public getImageWidth ( ) : int
	public getInterlaceScheme ( ) : int
	public getIteratorIndex ( ) : int
	public getNumberImages ( ) : int
	public getOption ( string $key ) : string
	public static getPackageName ( ) : string
	public getPage ( ) : array
	public getPixelIterator ( ) : ImagickPixelIterator
	public getPixelRegionIterator ( int $x , int $y , int $columns , int $rows ) : ImagickPixelIterator
	public getPointSize ( ) : float
	public static getQuantum ( ) : int
	public static getQuantumDepth ( ) : array
	public static getQuantumRange ( ) : array
	public static getRegistry ( string $key ) : string
	public static getReleaseDate ( ) : string
	public static getResource ( int $type ) : int
	public static getResourceLimit ( int $type ) : int
	public getSamplingFactors ( ) : array
	public getSize ( ) : array
	public getSizeOffset ( ) : int
	public static getVersion ( ) : array
	public haldClutImage ( Imagick $clut , int $channel = Imagick::CHANNEL_DEFAULT ) : bool
	public hasNextImage ( ) : bool
	public hasPreviousImage ( ) : bool
	public identifyFormat ( string $embedText ) : string|false
	public identifyImage ( bool $appendRawOutput = false ) : array
	public implodeImage ( float $radius ) : bool
	public importImagePixels ( int $x , int $y , int $width , int $height , string $map , int $storage , array $pixels ) : bool
	public inverseFourierTransformImage ( Imagick $complement , bool $magnitude ) : bool
	public labelImage ( string $label ) : bool
	public levelImage ( float $blackPoint , float $gamma , float $whitePoint , int $channel = Imagick::CHANNEL_DEFAULT ) : bool
	public linearStretchImage ( float $blackPoint , float $whitePoint ) : bool
	public liquidRescaleImage ( int $width , int $height , float $delta_x , float $rigidity ) : bool
	public static listRegistry ( ) : array
	public magnifyImage ( ) : bool
	public mapImage ( Imagick $map , bool $dither ) : bool
	public matteFloodfillImage ( float $alpha , float $fuzz , mixed $bordercolor , int $x , int $y ) : bool
	public medianFilterImage ( float $radius ) : bool
	public mergeImageLayers ( int $layer_method ) : Imagick
	public minifyImage ( ) : bool
	public modulateImage ( float $brightness , float $saturation , float $hue ) : bool
	public montageImage ( ImagickDraw $draw , string $tile_geometry , string $thumbnail_geometry , int $mode , string $frame ) : Imagick
	public morphImages ( int $number_frames ) : Imagick
	public morphology ( int $morphologyMethod , int $iterations , ImagickKernel $ImagickKernel , int $channel = Imagick::CHANNEL_DEFAULT ) : bool
	public mosaicImages ( ) : Imagick
	public motionBlurImage ( float $radius , float $sigma , float $angle , int $channel = Imagick::CHANNEL_DEFAULT ) : bool
	public negateImage ( bool $gray , int $channel = Imagick::CHANNEL_DEFAULT ) : bool
	newImage ( int $cols , int $rows , mixed $background , string $format = ? ) : bool
	public newPseudoImage ( int $columns , int $rows , string $pseudoString ) : bool
	public nextImage ( ) : bool
	public normalizeImage ( int $channel = Imagick::CHANNEL_DEFAULT ) : bool
	public oilPaintImage ( float $radius ) : bool
	public opaquePaintImage ( mixed $target , mixed $fill , float $fuzz , bool $invert , int $channel = Imagick::CHANNEL_DEFAULT ) : bool
	public optimizeImageLayers ( ) : bool
	public orderedPosterizeImage ( string $threshold_map , int $channel = Imagick::CHANNEL_DEFAULT ) : bool
	public paintFloodfillImage ( mixed $fill , float $fuzz , mixed $bordercolor , int $x , int $y , int $channel = Imagick::CHANNEL_DEFAULT ) : bool
	public paintOpaqueImage ( mixed $target , mixed $fill , float $fuzz , int $channel = Imagick::CHANNEL_DEFAULT ) : bool
	public paintTransparentImage ( mixed $target , float $alpha , float $fuzz ) : bool
	public pingImage ( string $filename ) : bool
	public pingImageBlob ( string $image ) : bool
	public pingImageFile ( resource $filehandle , string $fileName = ? ) : bool
	public polaroidImage ( ImagickDraw $properties , float $angle ) : bool
	public posterizeImage ( int $levels , bool $dither ) : bool
	public previewImages ( int $preview ) : bool
	public previousImage ( ) : bool
	public profileImage ( string $name , string $profile ) : bool
	public quantizeImage ( int $numberColors , int $colorspace , int $treedepth , bool $dither , bool $measureError ) : bool
	public quantizeImages ( int $numberColors , int $colorspace , int $treedepth , bool $dither , bool $measureError ) : bool
	public queryFontMetrics ( ImagickDraw $properties , string $text , bool $multiline = ? ) : array
	public static queryFonts ( string $pattern = "*" ) : array
	public static queryFormats ( string $pattern = "*" ) : array
	public radialBlurImage ( float $angle , int $channel = Imagick::CHANNEL_DEFAULT ) : bool
	public raiseImage ( int $width , int $height , int $x , int $y , bool $raise ) : bool
	public randomThresholdImage ( float $low , float $high , int $channel = Imagick::CHANNEL_DEFAULT ) : bool
	public readImage ( string $filename ) : bool
	readImageBlob ( string $image , string $filename = ? ) : bool
	public readImageFile ( resource $filehandle , string $fileName = null ) : bool
	public readImages ( array $filenames ) : bool
	public recolorImage ( array $matrix ) : bool
	public reduceNoiseImage ( float $radius ) : bool
	public remapImage ( Imagick $replacement , int $DITHER ) : bool
	public removeImage ( ) : bool
	public removeImageProfile ( string $name ) : string
	public render ( ) : bool
	public resampleImage ( float $x_resolution , float $y_resolution , int $filter , float $blur ) : bool
	public resetImagePage ( string $page ) : bool
	public resizeImage ( int $columns , int $rows , int $filter , float $blur , bool $bestfit = false , bool $legacy = false ) : bool
	public rollImage ( int $x , int $y ) : bool
	public rotateImage ( mixed $background , float $degrees ) : bool
	public rotationalBlurImage ( float $angle , int $channel = Imagick::CHANNEL_DEFAULT ) : bool
	public roundCorners ( float $x_rounding , float $y_rounding , float $stroke_width = 10 , float $displace = 5 , float $size_correction = -6 ) : bool
	public sampleImage ( int $columns , int $rows ) : bool
	public scaleImage ( int $cols , int $rows , bool $bestfit = false , bool $legacy = false ) : bool
	public segmentImage ( int $COLORSPACE , float $cluster_threshold , float $smooth_threshold , bool $verbose = false ) : bool
	public selectiveBlurImage ( float $radius , float $sigma , float $threshold , int $channel = Imagick::CHANNEL_DEFAULT ) : bool
	public separateImageChannel ( int $channel ) : bool
	public sepiaToneImage ( float $threshold ) : bool
	public setBackgroundColor ( mixed $background ) : bool
	public setColorspace ( int $COLORSPACE ) : bool
	public setCompression ( int $compression ) : bool
	public setCompressionQuality ( int $quality ) : bool
	public setFilename ( string $filename ) : bool
	public setFirstIterator ( ) : bool
	public setFont ( string $font ) : bool
	public setFormat ( string $format ) : bool
	public setGravity ( int $gravity ) : bool
	public setImage ( Imagick $replace ) : bool
	public setImageAlphaChannel ( int $mode ) : bool
	public setImageArtifact ( string $artifact , string $value ) : bool
	public setImageAttribute ( string $key , string $value ) : bool
	public setImageBackgroundColor ( mixed $background ) : bool
	public setImageBias ( float $bias ) : bool
	public setImageBiasQuantum ( string $bias ) : void
	public setImageBluePrimary ( float $x , float $y ) : bool
	public setImageBorderColor ( mixed $border ) : bool
	public setImageChannelDepth ( int $channel , int $depth ) : bool
	public setImageClipMask ( Imagick $clip_mask ) : bool
	public setImageColormapColor ( int $index , ImagickPixel $color ) : bool
	public setImageColorspace ( int $colorspace ) : bool
	public setImageCompose ( int $compose ) : bool
	setImageCompression ( int $compression ) : bool
	setImageCompressionQuality ( int $quality ) : bool
	public setImageDelay ( int $delay ) : bool
	public setImageDepth ( int $depth ) : bool
	public setImageDispose ( int $dispose ) : bool
	public setImageExtent ( int $columns , int $rows ) : bool
	public setImageFilename ( string $filename ) : bool
	setImageFormat ( string $format ) : bool
	public setImageGamma ( float $gamma ) : bool
	public setImageGravity ( int $gravity ) : bool
	public setImageGreenPrimary ( float $x , float $y ) : bool
	public setImageIndex ( int $index ) : bool
	public setImageInterlaceScheme ( int $interlace_scheme ) : bool
	public setImageInterpolateMethod ( int $method ) : bool
	public setImageIterations ( int $iterations ) : bool
	public setImageMatte ( bool $matte ) : bool
	public setImageMatteColor ( mixed $matte ) : bool
	public setImageOpacity ( float $opacity ) : bool
	public setImageOrientation ( int $orientation ) : bool
	public setImagePage ( int $width , int $height , int $x , int $y ) : bool
	public setImageProfile ( string $name , string $profile ) : bool
	public setImageProperty ( string $name , string $value ) : bool
	public setImageRedPrimary ( float $x , float $y ) : bool
	public setImageRenderingIntent ( int $rendering_intent ) : bool
	public setImageResolution ( float $x_resolution , float $y_resolution ) : bool
	public setImageScene ( int $scene ) : bool
	public setImageTicksPerSecond ( int $ticks_per_second ) : bool
	public setImageType ( int $image_type ) : bool
	public setImageUnits ( int $units ) : bool
	public setImageVirtualPixelMethod ( int $method ) : bool
	public setImageWhitePoint ( float $x , float $y ) : bool
	public setInterlaceScheme ( int $interlace_scheme ) : bool
	public setIteratorIndex ( int $index ) : bool
	public setLastIterator ( ) : bool
	public setOption ( string $key , string $value ) : bool
	public setPage ( int $width , int $height , int $x , int $y ) : bool
	public setPointSize ( float $point_size ) : bool
	public setProgressMonitor ( callable $callback ) : bool
	public static setRegistry ( string $key , string $value ) : bool
	public setResolution ( float $x_resolution , float $y_resolution ) : bool
	public static setResourceLimit ( int $type , int $limit ) : bool
	public setSamplingFactors ( array $factors ) : bool
	public setSize ( int $columns , int $rows ) : bool
	public setSizeOffset ( int $columns , int $rows , int $offset ) : bool
	public setType ( int $image_type ) : bool
	public shadeImage ( bool $gray , float $azimuth , float $elevation ) : bool
	public shadowImage ( float $opacity , float $sigma , int $x , int $y ) : bool
	public sharpenImage ( float $radius , float $sigma , int $channel = Imagick::CHANNEL_DEFAULT ) : bool
	public shaveImage ( int $columns , int $rows ) : bool
	public shearImage ( mixed $background , float $x_shear , float $y_shear ) : bool
	public sigmoidalContrastImage ( bool $sharpen , float $alpha , float $beta , int $channel = Imagick::CHANNEL_DEFAULT ) : bool
	public sketchImage ( float $radius , float $sigma , float $angle ) : bool
	public smushImages ( bool $stack , int $offset ) : Imagick
	public solarizeImage ( int $threshold ) : bool
	public sparseColorImage ( int $SPARSE_METHOD , array $arguments , int $channel = Imagick::CHANNEL_DEFAULT ) : bool
	public spliceImage ( int $width , int $height , int $x , int $y ) : bool
	public spreadImage ( float $radius ) : bool
	public statisticImage ( int $type , int $width , int $height , int $channel = Imagick::CHANNEL_DEFAULT ) : bool
	public steganoImage ( Imagick $watermark_wand , int $offset ) : Imagick
	public stereoImage ( Imagick $offset_wand ) : bool
	stripImage ( ) : bool
	public subImageMatch ( Imagick $Imagick , array &$offset = ? , float &$similarity = ? ) : Imagick
	swirlImage ( float $degrees ) : bool
	textureImage ( Imagick $texture_wand ) : Imagick
	public thresholdImage ( float $threshold , int $channel = Imagick::CHANNEL_DEFAULT ) : bool
	public thumbnailImage ( int $columns , int $rows , bool $bestfit = false , bool $fill = false , bool $legacy = false ) : bool
	public tintImage ( mixed $tint , mixed $opacity , bool $legacy = false ) : bool
	public __toString ( ) : string
	public transformImage ( string $crop , string $geometry ) : Imagick
	public transformImageColorspace ( int $colorspace ) : bool
	public transparentPaintImage ( mixed $target , float $alpha , float $fuzz , bool $invert ) : bool
	public transposeImage ( ) : bool
	public transverseImage ( ) : bool
	public trimImage ( float $fuzz ) : bool
	public uniqueImageColors ( ) : bool
	public unsharpMaskImage ( float $radius , float $sigma , float $amount , float $threshold , int $channel = Imagick::CHANNEL_DEFAULT ) : bool
	public valid ( ) : bool
	public vignetteImage ( float $blackPoint , float $whitePoint , int $x , int $y ) : bool
	public waveImage ( float $amplitude , float $length ) : bool
	public whiteThresholdImage ( mixed $threshold ) : bool
	writeImage ( string $filename = NULL ) : bool
	public writeImageFile ( resource $filehandle , string $format = ? ) : bool
	public writeImages ( string $filename , bool $adjoin ) : bool
	public writeImagesFile ( resource $filehandle , string $format = ? ) : bool
}