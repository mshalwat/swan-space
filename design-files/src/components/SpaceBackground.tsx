export function SpaceBackground() {
  return (
    <>
      {/* Animated stars background */}
      <div className="fixed inset-0 overflow-hidden pointer-events-none z-0">
        {/* Large stars */}
        {[...Array(50)].map((_, i) => (
          <div
            key={`star-${i}`}
            className="absolute w-1 h-1 bg-white rounded-full"
            style={{
              top: `${Math.random() * 100}%`,
              left: `${Math.random() * 100}%`,
              animation: `twinkle ${2 + Math.random() * 3}s ease-in-out infinite`,
              animationDelay: `${Math.random() * 2}s`,
              opacity: Math.random() * 0.7 + 0.3,
            }}
          />
        ))}
        
        {/* Medium stars */}
        {[...Array(30)].map((_, i) => (
          <div
            key={`star-med-${i}`}
            className="absolute w-0.5 h-0.5 bg-cyan-300 rounded-full"
            style={{
              top: `${Math.random() * 100}%`,
              left: `${Math.random() * 100}%`,
              animation: `twinkle ${3 + Math.random() * 2}s ease-in-out infinite`,
              animationDelay: `${Math.random() * 3}s`,
            }}
          />
        ))}
        
        {/* Floating nebula effects */}
        <div
          className="absolute w-[600px] h-[600px] rounded-full opacity-20 blur-3xl"
          style={{
            top: '10%',
            right: '10%',
            background: 'radial-gradient(circle, rgba(139, 92, 246, 0.4) 0%, transparent 70%)',
            animation: 'float 20s ease-in-out infinite',
          }}
        />
        <div
          className="absolute w-[500px] h-[500px] rounded-full opacity-20 blur-3xl"
          style={{
            bottom: '20%',
            left: '5%',
            background: 'radial-gradient(circle, rgba(236, 72, 153, 0.3) 0%, transparent 70%)',
            animation: 'float 25s ease-in-out infinite reverse',
          }}
        />
        <div
          className="absolute w-[400px] h-[400px] rounded-full opacity-15 blur-3xl"
          style={{
            top: '50%',
            left: '50%',
            background: 'radial-gradient(circle, rgba(6, 182, 212, 0.3) 0%, transparent 70%)',
            animation: 'float 30s ease-in-out infinite',
            animationDelay: '5s',
          }}
        />
      </div>
      
      {/* Gradient overlay */}
      <div className="fixed inset-0 pointer-events-none z-0">
        <div
          className="absolute inset-0"
          style={{
            background: 'radial-gradient(ellipse at top, transparent 0%, rgba(10, 14, 39, 0.8) 100%)',
          }}
        />
      </div>
    </>
  );
}
