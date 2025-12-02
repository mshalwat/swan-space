import swanSpaceLogo from 'figma:asset/5c0dde3b923e87af7ba9ec909fd5edf4d6bec6ed.png';

interface LogoProps {
  className?: string;
  size?: 'sm' | 'md' | 'lg';
  showText?: boolean;
}

export function Logo({ className = '', size = 'md', showText = true }: LogoProps) {
  const sizeClasses = {
    sm: showText ? 'h-8' : 'h-8',
    md: showText ? 'h-10' : 'h-10',
    lg: showText ? 'h-14' : 'h-14',
  };

  return (
    <div className={`relative group ${className}`}>
      {/* Animated glow effect */}
      <div className="absolute -inset-2 bg-gradient-to-r from-purple-600 via-pink-500 to-fuchsia-500 rounded-xl blur-xl opacity-0 group-hover:opacity-50 transition-opacity duration-500"></div>
      
      {/* Logo container */}
      <div className="relative flex items-center justify-center">
        <img 
          src={swanSpaceLogo} 
          alt="SwanSpace Logo" 
          className={`${sizeClasses[size]} w-auto object-contain transition-all duration-300 group-hover:scale-105`}
          style={{
            filter: 'hue-rotate(280deg) saturate(1.3) brightness(1.1) drop-shadow(0 0 8px rgba(217, 70, 239, 0.4))',
          }}
        />
      </div>
    </div>
  );
}
